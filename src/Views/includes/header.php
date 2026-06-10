<?php
// Vérifie si l'utilisateur est connecté
$isLogged = isset($_SESSION['user']) && !empty($_SESSION['user']);

// Récupération sécurisée des données utilisateur depuis la session
$prenom = $_SESSION['user']['prenom'] ?? 'Utilisateur';
$nom = $_SESSION['user']['nom'] ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche Pas Au Klaxon</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="/touche-pas-au-klaxon/public/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php?page=home">Touche Pas Au Klaxon</a>
        
        <div class="d-flex">
            <?php if ($isLogged): ?>
                <span class="navbar-text text-white me-3">
                    Bonjour, <?= htmlspecialchars($prenom . ' ' . $nom) ?>
                </span>
                <a href="index.php?page=create" class="btn btn-outline-light me-2">Proposer un trajet</a>
                <a href="index.php?page=logout" class="btn btn-danger">Déconnexion</a>
            <?php else: ?>
                <a href="index.php?page=login" class="btn btn-outline-light">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</nav>