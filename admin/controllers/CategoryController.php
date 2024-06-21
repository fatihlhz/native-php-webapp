<?php
class CategoryController extends Controller {
    public static function index() {
        global $base_url;

        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: $base_url/login");
            exit;
        }

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAllAndCount();

        require 'views/kategori.php';
    }

    public static function create() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];

            $categoryModel = new CategoryModel();
            $categoryModel->create($name);
        }

        header("Location: $base_url/kategori");
    }

    public static function update() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];

            $categoryModel = new CategoryModel();
            $categoryModel->update($id, $name);
        }

        header("Location: $base_url/kategori");
    }

    public static function delete() {
        global $base_url;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            $categoryModel = new CategoryModel();
            $categoryModel->delete($id);
        }

        header("Location: $base_url/kategori");
    }
}
?>