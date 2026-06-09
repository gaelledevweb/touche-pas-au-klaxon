<?php
/** @var array $trip */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du trajet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Détail du trajet</h3>
        </div>
        <div class="card-body">
            <p><strong>Départ :</strong> <?= htmlspecialchars($trip['depart']) ?></p>
            <p><strong>Arrivée :</strong> <?= htmlspecialchars($trip['arrivee']) ?></p>
            <p><strong>Départ le :</strong> <?= htmlspecialchars($trip['date_heure_depart']) ?></p>
            <p><strong>Places disponibles :</strong> <?= htmlspecialchars($trip['places_disponibles']) ?></p>
            
            <a href="index.php?page=home" class="btn btn-secondary">Retour à la liste</a>
            <a href="#" class="btn btn-success">Confirmer la réservation</a>
        </div>
    </div>
</div>

</body>
</html>