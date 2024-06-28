<?php
class BorrowModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function get($id_user) {
        $stmt = $this->pdo->prepare("SELECT 
            b.title AS title,
            br.id AS borrow_id,
            c.name AS category
            FROM 
                Book b
            JOIN 
                Borrowed br ON b.id = br.id_book
            JOIN 
                Category c ON b.id_category = c.id
            WHERE 
            br.id_user = :id_user;");

        $stmt->execute(['id_user' => $id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>