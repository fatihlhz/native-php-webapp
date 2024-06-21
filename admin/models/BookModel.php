<?php
class BookModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT 
                b.id AS id, 
                b.title AS title, 
                c.name AS category, 
                CASE 
                    WHEN br.id IS NOT NULL THEN 'Dipinjam' 
                    ELSE 'Free' 
                END AS status, 
                COALESCE(u.email, '-') AS user
            FROM 
                Book b
            LEFT JOIN 
                Category c ON b.id_category = c.id
            LEFT JOIN 
                Borrowed br ON b.id = br.id_book
            LEFT JOIN 
                User u ON br.id_user = u.id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $id_category) {
        $stmt = $this->pdo->prepare('INSERT INTO book (title, id_category) VALUES (:title, :id_category)');
        return $stmt->execute(['title' => $title, 'id_category' => $id_category]);
    }

    public function update($id, $title, $id_category) {
        $stmt = $this->pdo->prepare('UPDATE book SET title = :title, id_category = :id_category WHERE id = :id');
        return $stmt->execute(['id' => $id, 'title' => $title, 'id_category' => $id_category]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM book WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>