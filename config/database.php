<?php

// Informations de connexion
$host = 'localhost';
$dbname = 'touche_pas_au_klaxon';
$username = 'root';
$password = '';

try {
    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ]);
    return $pdo;
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}