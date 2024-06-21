<?php
require  'models/BookModel.php';
require  'models/CategoryModel.php';

class BukuController extends Controller {
    public static function index() {
        global $base_url;

        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: $base_url/login");
            exit;
        }

        $bookModel = new BookModel();
        $books = $bookModel->getAll();

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        require 'views/buku.php';
    }

    public static function tambah() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $id_category = $_POST['category'];

            // echo $title;
            // echo " $id_category"
            $bookModel = new BookModel();
            $bookModel->create($title, $id_category);
        }

        header("Location: $base_url/buku");
    }
}
?>