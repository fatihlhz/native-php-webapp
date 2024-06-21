<?php
class CategoryModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare('SELECT * FROM category');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAndCount() {
        $stmt = $this->pdo->prepare('SELECT 
                c.id AS id,
                c.name AS name,
                COUNT(b.id) AS book_count
            FROM 
                Category c
            LEFT JOIN 
                Book b ON c.id = b.id_category
            GROUP BY 
                c.id, c.name;');
                
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name) {
        $stmt = $this->pdo->prepare('INSERT INTO category (name) VALUES (:name)');
        return $stmt->execute(['name' => $name]);
    }

    public function update($id, $name) {
        $stmt = $this->pdo->prepare('UPDATE category SET name = :name WHERE id = :id');
        return $stmt->execute(['id' => $id, 'name' => $name]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM category WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>