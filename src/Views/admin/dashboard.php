<?php
// Utilisation du header spécifique pour l'admin
require_once __DIR__ . '/../includes/header_admin.php';
?>

<div class="container mt-4">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card p-3 bg-light">Utilisateurs : <strong><?= $nbUsers ?></strong></div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 bg-light">Agences : <strong><?= $nbAgencies ?></strong></div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 bg-light">Trajets : <strong><?= $nbTrips ?></strong></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h4>Utilisateurs</h4>
            <table class="table table-striped table-hover border">
                <thead class="table-dark">
                    <tr>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h4>Agences</h4>
            <table class="table table-striped table-hover border">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agencies as $agency): ?>
                        <tr>
                            <td><?= htmlspecialchars($agency['nom']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h4>Trajets</h4>
            <table class="table table-striped table-hover border">
                <thead class="table-dark">
                    <tr>
                        <th>Trajet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trips as $trip): ?>
                        <tr>
                            <td><?= htmlspecialchars($trip['depart']) ?> ➔ <?= htmlspecialchars($trip['arrivee']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>