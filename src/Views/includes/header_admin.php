<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin - Touche pas au klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Personnalisation */
        .admin-header {
            background-color: white;
            border: 1px solid #dee2e6;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-gray {
            background-color: #6c757d;
            color: white;
            border: none;
            margin-right: 10px;
        }

        .btn-black {
            background-color: #212529;
            color: white;
        }
    </style>
</head>

<body class="bg-light">

    <header class="admin-header container mt-3">
        <a href="index.php?page=admin" class="text-dark fw-bold text-decoration-none h4 m-0">Touche pas au klaxon</a>

        <div class="d-flex align-items-center">
            <a href="index.php?page=admin_users" class="btn btn-gray me-2">Utilisateurs</a>
            <a href="index.php?page=admin_agencies" class="btn btn-gray me-2">Agences</a>
            <a href="index.php?page=admin_trips" class="btn btn-gray me-2">Trajets</a>

            <span class="mx-3">Bonjour <?= htmlspecialchars($_SESSION['user']['prenom'] ?? 'Admin') ?></span>
            <a href="index.php?page=logout" class="btn btn-black">Déconnexion</a>
        </div>
    </header>