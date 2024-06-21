<?php
class UserModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getUserByEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($email, $password) {
        $stmt = $this->pdo->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
        return $stmt->execute(['email' => $email, 'password' => $password]);
    }
}
?>