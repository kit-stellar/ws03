<?php
    namespace App\Controllers;

    use Framework\Database;
    use Framework\Validation;
    use Framework\Session;

    class UserController {
        protected $db;

        public function __construct() {
            $config = require basePath('config/db.php');
            $this->db = new Database($config);
        }

        /**
         * Show register page
         */
        public function create($params = []) {
            loadView('Users/create');
        }

        /**
         * Show login page
         */
        public function login($params = []) {
            loadView('Users/login');
        }

        /**
         * Store user to database
         */
        public function store($params = []) {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $city = $_POST['city'] ?? '';
            $state = $_POST['state'] ?? '';
            $password = $_POST['password'] ?? '';
            $passwordConfirmation = $_POST['password_confirmation'] ?? '';

            $errors = [];

            if (!Validation::email($email)) {
                $errors['email'] = 'Please enter a valid email address';
            }

            if (!Validation::string($name, 2, 50)) {
                $errors['name'] = 'Name must be between 2 and 50 characters';
            }

            if (!Validation::string($password, 6)) {
                $errors['password'] = 'Password must be at least 6 characters';
            }

            if (!Validation::match($password, $passwordConfirmation)) {
                $errors['password_confirmation'] = 'Passwords do not match';
            }

            if (!empty($errors)) {
                loadView('Users/create', [
                    'errors' => $errors,
                    'user' => [
                        'name' => $name,
                        'email' => $email,
                        'city' => $city,
                        'state' => $state
                    ]
                ]);
                return;
            }

            // Check if email exists
            $params = ['email' => $email];
            $existingUser = $this->db->Query(
                "SELECT * FROM users WHERE email = :email",
                $params
            )->fetch();

            if ($existingUser) {
                $errors['email'] = 'That email already exists';
                loadView('Users/create', [
                    'errors' => $errors,
                    'user' => [
                        'name' => $name,
                        'email' => $email,
                        'city' => $city,
                        'state' => $state
                    ]
                ]);
                return;
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $params = [
                'name' => $name,
                'email' => $email,
                'city' => $city,
                'state' => $state,
                'password' => $hashedPassword
            ];

            $this->db->Query(
                "INSERT INTO users (name, email, city, state, password)
                VALUES (:name, :email, :city, :state, :password)",
                $params
            );

            $userId = $this->db->conn->lastInsertId();

            Session::set('user', [
                'id' => $userId,
                'name' => $name,
                'email' => $email,
                'city' => $city,
                'state' => $state
            ]);

            $_SESSION['success_message'] = 'Registration successful! Welcome!';
            redirect('/');
        }

        /**
         * Authenticate user with email and password
         */
        public function authenticate($params = []) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $errors = [];

            // Validate email
            if (!Validation::email($email)) {
                $errors['email'] = 'Please enter a valid email address';
            }

            // Validate password
            if (!Validation::string($password, 6)) {
                $errors['password'] = 'Password must be at least 6 characters';
            }

            if (!empty($errors)) {
                loadView('Users/login', [
                    'errors' => $errors
                ]);
                return;
            }

            // Check if email exists
            $params = ['email' => $email];
            $user = $this->db->Query(
                "SELECT * FROM users WHERE email = :email",
                $params
            )->fetch();

            if (!$user) {
                $errors['email'] = 'Incorrect credentials';
                loadView('Users/login', ['errors' => $errors]);
                return;
            }

            // Verify password
            if (!password_verify($password, $user->password)) {
                $errors['email'] = 'Incorrect credentials';
                loadView('Users/login', ['errors' => $errors]);
                return;
            }

            // Set session
            Session::set('user', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'city' => $user->city,
                'state' => $user->state
            ]);

            $_SESSION['success_message'] = 'Welcome back, ' . $user->name . '!';
            redirect('/');
        }

        /**
         * Logout user and kill session
         */
        public function logout($params = []) {
            Session::clearAll();

            $params = session_get_cookie_params();
            setcookie(
                'PHPSESSID',
                '',
                time() - 86400,
                $params['path'],
                $params['domain']
            );

            redirect('/');
        }
    }
?>