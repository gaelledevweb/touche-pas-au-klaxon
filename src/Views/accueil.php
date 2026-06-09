<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche Pas Au Klaxon - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary mb-4 shadow">
    <div class="container">
        <a class="navbar-brand" href="#">Touche Pas Au Klaxon</a>
    </div>
</nav>

<div class="container">
    <h2 class="mb-4">Trajets disponibles</h2>

    <?php if (empty($trips)): ?>
        <div class="alert alert-info">
            Aucun trajet disponible pour le moment.
        </div>
    <?php else: ?>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Départ</th>
                            <th>Arrivée</th>
                            <th>Date</th>
                            <th>Places</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($trips as $trip): ?>
                        <tr>
                            <td><?= htmlspecialchars($trip['depart']) ?></td>
                            <td><?= htmlspecialchars($trip['arrivee']) ?></td>
                            <td><?= htmlspecialchars($trip['date_heure_depart']) ?></td>
                            <td>
                                <span class="badge bg-success"><?= htmlspecialchars($trip['places_disponibles']) ?></span>
                            </td>
                            <td>
                                <a href="index.php?page=details&id=<?= $trip['id'] ?>" class="btn btn-sm btn-outline-primary">Réserver</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</html>