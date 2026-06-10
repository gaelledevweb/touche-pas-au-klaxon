<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Touche Pas Au Klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php?page=admin">Admin Panel</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=admin_users">Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=admin_agencies">Agences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=admin_trips">Trajets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light ms-lg-3" href="index.php?page=home">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>