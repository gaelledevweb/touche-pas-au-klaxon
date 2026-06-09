<?php

class AuthController {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function login() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérification simple (à sécuriser plus tard avec password_verify)
            if ($user && $password === $user['password']) {
                $_SESSION['user'] = $user;
                header('Location: index.php?page=home');
                exit;
            } else {
                $error = "Identifiants incorrects.";
            }
        }
        require_once __DIR__ . '/../Views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?page=home');
        exit;
    }
}