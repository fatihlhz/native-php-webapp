<?php
class RegisterController extends Controller {
    public static function index() {
        global $base_url;

        // session_start();
        // if (!isset($_SESSION['user'])) {
        //     header("Location: $base_url/register");
        //     exit;
        // }
        require 'views/register.php';
    }

    public static function create() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $userModel = new UserModel();
            $userModel->create($email, $password);
        }

        header("Location: $base_url/user");
    }
}
?>