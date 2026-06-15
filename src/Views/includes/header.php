<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$isLogged = isset($_SESSION['user']);
$prenom = $_SESSION['user']['prenom'] ?? 'Utilisateur';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche Pas Au Klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar { background-color: #fff !important; border-bottom: 1px solid #dee2e6; }
        .btn-black { background-color: #000; color: #fff; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php?page=home" alt="Logo Touche Pas Au Klaxon">Touche Pas Au Klaxon</a>
            <div class="d-flex">
                <?php if ($isLogged): ?>
                    <a href="index.php?page=create" class="btn btn-black me-2">Créer un trajet</a>
                    <span class="navbar-text me-3">Bonjour, <?= htmlspecialchars($prenom) ?></span>
                    <a href="index.php?page=logout" class="btn btn-outline-danger">Déconnexion</a>
                <?php else: ?>
                    <a href="index.php?page=login" class="btn btn-black">Connexion</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="loginToast" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">Connexion réussie, bienvenue !</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
