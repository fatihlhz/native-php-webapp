<?php
class HomeController extends Controller {    
    public static function index() {
        global $base_url;

        if($_SESSION['user'] == null) {
            header("Location: $base_url/login");
        }
        header("Location: $base_url/dashboard");
    }

    public static function login() {
        global $base_url;

        if (isset($_SESSION['user'])) {
            header("Location: $base_url/dashboard");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->getUserByEmail($email);


            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user['email'];
                $_SESSION['id_user'] = $user['id'];
                header("Location: $base_url/dashboard");
                exit;
            } else {
                $message = "Ini adalah pesan alert";
                echo "<script type='text/javascript'>alert('$message');</script>";

            }
        }
        require 'views/login.php';
    }

    public static function logout() {
        global $base_url;

        session_start();
        session_destroy();
        header("Location: $base_url/login");
    }
}
?>