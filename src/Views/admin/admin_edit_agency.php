<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="container mt-4">
    <h2>Modifier l'agence</h2>
    <form action="index.php?page=admin_update_agency&id=<?= $agency['id'] ?>" method="POST">
        <div class="mb-3">
            <label>Nom de l'agence</label>
            <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($agency['nom']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>