<?php require_once __DIR__ . '/../includes/header_admin.php'; ?>
<div class="container mt-4">
    <h2>Ajouter une agence</h2>
    <form action="index.php?page=admin_store_agency" method="POST">
        <input type="text" name="nom" class="form-control mb-2" placeholder="Nom de l'agence" required>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>