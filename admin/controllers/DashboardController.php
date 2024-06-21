<?php
require  'models/UtilityModel.php';

class DashboardController extends Controller {
    public static function index() {
        global $base_url;

        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: $base_url/login");
            exit;
        }

        $utility = new UtilityModel();
        $data = $utility->countAll();
        
        require 'views/dashboard.php';
    }
}
?>