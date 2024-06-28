<?php

require 'models/BorrowModel.php';
class PinjamanController extends Controller {
    public static function index() {
        global $base_url;

        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: $base_url/login");
            exit;
        }
        
        $id_user = $_SESSION['id_user'];

        $borrowModel = new BorrowModel();
        $data_peminjaman = $borrowModel->get($id_user);

        require 'views/pinjam.php';
    }
}
?>