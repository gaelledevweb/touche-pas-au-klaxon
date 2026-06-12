<?php require_once __DIR__ . '/../includes/header_admin.php'; ?>

<div class="container mt-4">
    <h2>Gestion des Trajets</h2>
    <table class="table table-hover align-middle mt-3">
        <thead class="table-light">
            <tr>
                <th>ID</th><th>Départ</th><th>Arrivée</th><th>Date</th><th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($trips)): ?>
                <?php foreach ($trips as $trip): ?>
                <tr>
                    <td><?= $trip['id'] ?></td>
                    <td><?= htmlspecialchars($trip['nom_depart']) ?></td>
                    <td><?= htmlspecialchars($trip['nom_arrivee']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($trip['date_heure_depart'])) ?></td>
                    <td class="text-center">
                        <a href="index.php?page=admin_delete_trip&id=<?= $trip['id'] ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Confirmer la suppression ?')">🗑️</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">Aucun trajet trouvé.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>