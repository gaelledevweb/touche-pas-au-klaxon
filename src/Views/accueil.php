<?php
require_once __DIR__ . '/includes/header.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche Pas Au Klaxon - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
    <h1 class="mb-4">Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</h1>

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
                            <th>Date/Heure</th>
                            <th>Destination</th>
                            <th>Date/Heure</th>
                            <th>Places</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($trips as $trip): ?>
                        <tr>
                            <td><?= htmlspecialchars($trip['depart']) ?></td>
                            <td><?= htmlspecialchars($trip['date_heure_depart']) ?></td>
                            <td><?= htmlspecialchars($trip['arrivee']) ?></td>
                            <td><?= htmlspecialchars($trip['date_heure_arrivee']) ?></td>
                            <td>
                                <span class="badge bg-success"><?= htmlspecialchars($trip['places_disponibles']) ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

