<?php

require 'models/BookModel.php';
class DashboardController extends Controller {
    public static function index() {
        global $base_url;

        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: $base_url/login");
            exit;
        }
        $id_user = $_SESSION['id_user'];
        $bookModel = new BookModel();
        $books = $bookModel->getAll($id_user);

        require 'views/dashboard.php';
    }

    public static function create() {
        global $base_url;

        if (isset($_SESSION['user'])) {
            header("Location: $base_url/dashboard");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_book = $_POST['id_book'];
            $id_user = $_POST['id_user'];

            $bookModel = new bookModel();
            $bookModel->pinjam($id_book, $id_user);


        }

        header("Location: $base_url/dashboard");
    }


}
?>