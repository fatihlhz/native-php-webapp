<?php
require 'models/CategoryModel.php';
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

        require 'views/category.php';
    }
}
?>