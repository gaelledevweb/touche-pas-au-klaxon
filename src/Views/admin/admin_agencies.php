<?php require_once __DIR__ . '/../includes/header_admin.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestion des Agences</h2>
        <a href="index.php?page=admin_add_agency" class="btn btn-primary">+ Ajouter une agence</a>
    </div>

    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nom Agence</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($agencies)): ?>
                <?php foreach ($agencies as $agency): ?>
                <tr>
                    <td><?= $agency['id'] ?></td>
                    <td><?= htmlspecialchars($agency['nom']) ?></td>
                    <td class="text-center">
                        <a href="index.php?page=admin_edit_agency&id=<?= $agency['id'] ?>" 
                           class="btn btn-sm btn-warning me-2" title="Modifier">✏️</a>
                        
                        <a href="index.php?page=admin_delete_agency&id=<?= $agency['id'] ?>" 
                           class="btn btn-sm btn-danger" title="Supprimer" 
                           onclick="return confirm('Confirmer la suppression de cette agence ?')">🗑️</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Aucune agence trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>