<?php
class UserController extends Controller {
    public static function index() {
        global $base_url;

        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: $base_url/login");
            exit;
        }

        $userModel = new UserModel();
        $users = $userModel->getAll();

        require 'views/user.php';
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

    public static function update() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $email = $_POST['email'];

            $userModel = new UserModel();
            $userModel->update($id, $email);
        }

        header("Location: $base_url/user");
    }

    public static function delete() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            $userModel = new UserModel();
            $userModel->delete($id);
        }

        header("Location: $base_url/user");
    }
}
?>