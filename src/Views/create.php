<?php
require_once __DIR__ . '/includes/header.php';
?>

<div class="container mt-4">
    <h2>Proposer un nouveau trajet</h2>
    <form action="index.php?page=store" method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Ville de départ</label>
            <input type="text" name="depart" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ville d'arrivée</label>
            <input type="text" name="arrivee" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Date et heure</label>
            <input type="datetime-local" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre de places</label>
            <input type="number" name="places" class="form-control" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer le trajet</button>
    </form>
</div>