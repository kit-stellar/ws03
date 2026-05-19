<?php
    namespace Framework;

    use App\Controllers\ErrorController;
    use Framework\Middleware\Authorize;

    class Router {
        protected $routes = [];

        public function registerRoute($method, $uri, $controller, $middleware = []) {
            $this->routes[] = [
                'method' => $method,
                'uri' => $uri,
                'controller' => $controller,
                'middleware' => $middleware
            ];
        }

        public function get($uri, $controller, $middleware = []) {
            $this->registerRoute('GET', $uri, $controller, $middleware);
        }

        public function post($uri, $controller, $middleware = []) {
            $this->registerRoute('POST', $uri, $controller, $middleware);
        }

        public function put($uri, $controller, $middleware = []) {
            $this->registerRoute('PUT', $uri, $controller, $middleware);
        }

        public function delete($uri, $controller, $middleware = []) {
            $this->registerRoute('DELETE', $uri, $controller, $middleware);
        }

        public function route($uri, $method) {
            // Check for method override
            if ($method === 'POST' && isset($_POST['_method'])) {
                $method = strtoupper($_POST['_method']);
            }

            $uriSegments = explode('/', trim($uri, '/'));

            foreach ($this->routes as $route) {
                $routeSegments = explode('/', trim($route['uri'], '/'));

                $match = true;
                $params = [];

                if (count($uriSegments) === count($routeSegments)
                    && strtoupper($method) === strtoupper($route['method'])) {

                    for ($i = 0; $i < count($routeSegments); $i++) {
                        if ($routeSegments[$i] !== $uriSegments[$i]
                            && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                            $match = false;
                            break;
                        }

                        if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                            $params[$matches[1]] = $uriSegments[$i];
                        }
                    }

                    if ($match) {
                        // Run middleware
                        foreach ($route['middleware'] as $middleware) {
                            $authorize = new Authorize();
                            $authorize->handle($middleware);
                        }

                        list($controller, $controllerMethod) = explode('@', $route['controller']);
                        $controllerClass = 'App\\Controllers\\' . $controller;
                        $controllerInstance = new $controllerClass();
                        $controllerInstance->$controllerMethod($params);
                        return;
                    }
                }
            }

            ErrorController::notFound();
        }
    }
?>