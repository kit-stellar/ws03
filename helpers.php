<?php
    function basePath(string $path): string {
        return BASE_PATH . '/' . $path;
    }

    function loadView($name, $data = []) {
        $viewPath = basePath('app/Views/' . $name . '.view.php');
        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            die("View not found: " . $name);
        }
    }

    function loadPartial($name, $data = []) {
        $partialPath = basePath('app/Views/Partials/' . $name . '.php');
        if (file_exists($partialPath)) {
            extract($data);
            require $partialPath;
        } else {
            die("Partial not found: " . $name);
        }
    }

    function inspect($value) {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    function inspectAndDie($value) {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }

    function formatSalary($salary) {
        return '$' . number_format((float)$salary, 2, '.', ',');
    }

    function sanitize($dirty) {
        return filter_var(trim($dirty ?? ''), FILTER_SANITIZE_SPECIAL_CHARS);
    }  

    function redirect($url) {
        header("Location: {$url}");
        exit();
    }
?>