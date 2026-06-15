<?php

// Démarrage de la session
session_start();

// Chargement des dépendances
$db = require_once __DIR__ . '/../config/database.php';

require_once __DIR__ . '/../src/Controllers/TrajetController.php';
require_once __DIR__ . '/../src/Controllers/AuthController.php';

// Récupération de la route demandée
$page = $_GET['page'] ?? 'home';

// Initialisation des contrôleurs
$trajetController = new TrajetController($db);
$authController = new AuthController($db);

// Routeur central
switch ($page) {
    // Pages Publiques
    case 'home':
        $trajetController->index();
        break;
    case 'details':
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $id ? $trajetController->show($id) : print("<h1>ID invalide</h1>");
        break;
    case 'create':
        $trajetController->create();
        break;
    case 'store':
        $trajetController->store();
        break;

    // Routes pour modifications et suppressions
    case 'edit':
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $id ? $trajetController->edit($id) : print("<h1>ID invalide</h1>");
        break;
    case 'delete':
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $id ? $trajetController->delete($id) : print("<h1>ID invalide</h1>");
        break;

    // Pages Auth
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;

    // Pages Administrateur
    case 'admin':
        $trajetController->adminDashboard();
        break;
    case 'admin_users':
        $trajetController->listUsers();
        break;
    case 'admin_delete_user':
        $trajetController->deleteUser((int)($_GET['id'] ?? 0));
        break;
    case 'admin_agencies':
        $trajetController->listAgencies();
        break;
    case 'admin_delete_agency':
        $trajetController->deleteAgency((int)($_GET['id'] ?? 0));
        break;
    case 'admin_add_agency':
        $trajetController->createAgency();
        break;
    case 'admin_store_agency':
        $trajetController->storeAgency();
        break;
    case 'admin_edit_agency':
        $trajetController->editAgency((int)$_GET['id']);
        break;
    case 'admin_update_agency':
        $trajetController->updateAgency((int)$_GET['id']);
        break;
    case 'admin_trips':
        $trajetController->listTrips();
        break;
    case 'admin_delete_trip':
        $trajetController->deleteTrip((int)$_GET['id']);
        break;
    default:
        $trajetController->index();
        break;
}