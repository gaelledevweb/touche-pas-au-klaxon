<?php require_once __DIR__ . '/../includes/header_admin.php'; ?>
<div class="container mt-4">
    <h2>Gestion des Utilisateurs</h2>
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr><th>ID</th><th>Nom</th><th>Email</th><th class="text-center">Actions</th></tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['nom']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td class="text-center">
                    <a href="index.php?page=admin_delete_user&id=<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer ?')">🗑️</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>