<?php

class AuthService {
    /**
     * Tente de connecter l'utilisateur
     */
    public function login(string $email, string $password, PDO $db): bool {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public function logout(): void {
        session_destroy();
    }

    public function isLogged(): bool {
        return isset($_SESSION['user']);
    }
}