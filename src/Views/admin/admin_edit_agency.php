<?php require_once __DIR__ . '/../includes/header_admin.php'; ?>
<div class="container mt-4">
    <h2>Modifier l'agence</h2>
    <form action="index.php?page=admin_update_agency&id=<?= $agency['id'] ?>" method="POST">
        <input type="text" name="nom" class="form-control mb-2" value="<?= htmlspecialchars($agency['nom']) ?>" required>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
</div>