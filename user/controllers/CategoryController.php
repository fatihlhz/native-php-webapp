<?php
class CategoryController extends Controller {
    public static function index() {
        global $base_url;

        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: $base_url/login");
            exit;
        }
        require 'views/category.php';
    }
}
?>