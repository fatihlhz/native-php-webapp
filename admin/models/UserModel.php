<?php
class UserModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT 
                u.id AS id,
                u.email AS email,
                COALESCE(GROUP_CONCAT(b.title, ', '), '-') AS borrowed
            FROM 
                User u
            LEFT JOIN 
                Borrowed br ON u.id = br.id_user
            LEFT JOIN 
                Book b ON br.id_book = b.id
            GROUP BY 
                u.id, u.email;");
                
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserByEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($email, $password) {
        $stmt = $this->pdo->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
        return $stmt->execute(['email' => $email, 'password' => $password]);
    }

    public function update($id, $email) {
        $stmt = $this->pdo->prepare('UPDATE user SET email = :email WHERE id = :id');
        return $stmt->execute(['id' => $id, 'email' => $email]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM user WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>