<?php

// Connexion à la base de données
$db = require_once __DIR__ . '/../config/database.php';

// Chargement du contrôleur
require_once __DIR__ . '/../src/Controllers/TrajetController.php';
$controller = new TrajetController($db);

// On récupère la page demandée dans l'URL (ex: index.php?page=home)
$page = $_GET['page'] ?? 'home';

// Aiguillage (Routeur)
switch ($page) {
    case 'home':
        // On instancie le contrôleur avec la base de données
        $controller = new TrajetController($db);
        // On appelle la méthode qui affiche la liste
        $controller->index();
        break;

    case 'login':
        echo "<h1>Page de connexion</h1>";
        break;

    default:
        // Si la page demandée n'existe pas
        http_response_code(404);
        echo "<h1>Erreur 404 : Page non trouvée</h1>";
        break;
}