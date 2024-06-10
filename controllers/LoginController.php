<?php
require_once "./../../models/User.php";
class LoginController {
    public function index() {
        require_once 'views/login/index.php';
    }

    public function authenticate() {
        // Lógica para autenticar al usuario
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validar usuario
        $userModel = new User();
        $user = $userModel->getUserByUsernameAndPassword($username, $password);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            // header('Location: ' . BASE_URL . '/dashboard/index');
            return $_SESSION['user_id'];
        } else {
            // Redirigir al login con un mensaje de error
            header('Location: ' . BASE_URL . '/login/index?error=invalid_credentials');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/login/index');
    }

    public function prueba(){
        return "<h1>LoginController imported</h1>";
    }
}

