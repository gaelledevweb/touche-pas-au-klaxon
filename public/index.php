<?php

// Connexion à la base de données
$db = require_once __DIR__ . '/../config/database.php';

// Chargement du contrôleur
require_once __DIR__ . '/../src/Controllers/TrajetController.php';

// On récupère la page demandée dans l'URL
$page = $_GET['page'] ?? 'home';

// Routeur
switch ($page) {
    case 'home':
        $controller = new TrajetController($db);
        $controller->index();
        break;

    case 'details':
        // On récupère l'ID et on vérifie que c'est un nombre
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $controller = new TrajetController($db);
            $controller->show($id);
        } else {
            echo "<h1>Erreur : ID invalide</h1>";
        }
        break;

    case 'login':
        echo "<h1>Page de connexion</h1>";
        break;

    default:
        http_response_code(404);
        echo "<h1>Erreur 404 : Page non trouvée</h1>";
        break;
}