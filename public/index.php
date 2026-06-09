<?php

// Démarrage de la session
session_start();

/** * Chargement de la base de données 
 * @var PDO $db 
 */
$db = require_once __DIR__ . '/../config/database.php';

// Chargement des contrôleurs
require_once __DIR__ . '/../src/Controllers/TrajetController.php';
require_once __DIR__ . '/../src/Controllers/AuthController.php';

// Récupération de la page
$page = $_GET['page'] ?? 'home';

// Routeur
switch ($page) {
    case 'home':
        $controller = new TrajetController($db);
        $controller->index();
        break;

    case 'details':
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $controller = new TrajetController($db);
            $controller->show($id);
        } else {
            http_response_code(400);
            echo "<h1>ID invalide</h1>";
        }
        break;

    case 'login':
        $controller = new AuthController($db);
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController($db);
        $controller->logout();
        break;
    
    case 'create':
        $controller = new TrajetController($db);
        $controller->create();
        break;

    case 'store':
        $controller = new TrajetController($db);
        $controller->store();
        break;

    default:
        http_response_code(404);
        echo "<h1>Page non trouvée</h1>";
        break;
}