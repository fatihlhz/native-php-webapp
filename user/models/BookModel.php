<?php
class BookModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll($id_user) {
        $stmt = $this->pdo->prepare("SELECT 
    b.id AS book_id,
    b.title AS title,
    c.name AS category,
    br.id AS id_borrow
FROM 
    Book b
JOIN
    Category c ON b.id_category = c.id
LEFT JOIN 
    Borrowed br ON b.id = br.id_book
WHERE 
    br.id_user IS NULL");

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

    public function pinjam($id_book,$id_user){
        $stmt = $this->pdo->prepare('INSERT INTO borrowed (id_book, id_user) VALUES (:id_book, :id_user)');
        return $stmt->execute(['id_book' => $id_book, 'id_user' => $id_user]);
    }
}
?>