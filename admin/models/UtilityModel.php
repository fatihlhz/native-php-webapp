<?php 
class UtilityModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function countAll() {
        $stmt = $this->pdo->prepare('SELECT 
            (SELECT COUNT(*) FROM Book) AS book,
            (SELECT COUNT(*) FROM Category) AS category,
            (SELECT COUNT(*) FROM Borrowed) AS borrowed,
            (SELECT COUNT(*) FROM User) AS user;
        ');

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>