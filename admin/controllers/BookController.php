<?php
require  'models/BookModel.php';
require  'models/CategoryModel.php';

class BookController extends Controller {
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

    public static function create() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $id_category = $_POST['category'];

            $bookModel = new BookModel();
            $bookModel->create($title, $id_category);
        }

        header("Location: $base_url/buku");
    }

    public static function update() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $id_category = $_POST['category'];

            $bookModel = new BookModel();
            $bookModel->update($id, $title, $id_category);
        }

        header("Location: $base_url/buku");
    }

    public static function delete() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            $bookModel = new BookModel();
            $bookModel->delete($id);
        }

        header("Location: $base_url/buku");
    }
}
?>