<?php
require_once __DIR__ . '/includes/header.php';
?>

<div class="container mt-4">
    <h2>Modifier le trajet</h2>
    
    <form action="index.php?page=update&id=<?= $trip['id'] ?>" method="POST">
        
        <div class="mb-3">
            <label for="agence_depart_id" class="form-label">Ville de départ</label>
            <select name="agence_depart_id" id="agence_depart_id" class="form-select" required>
                <option value="">Sélectionnez une ville</option>
                <?php foreach ($agencies as $agency): ?>
                    <option value="<?= $agency['id'] ?>" <?= ($agency['id'] == $trip['agence_depart_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($agency['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="agence_arrivee_id" class="form-label">Ville d'arrivée</label>
            <select name="agence_arrivee_id" id="agence_arrivee_id" class="form-select" required>
                <option value="">Sélectionnez une ville</option>
                <?php foreach ($agencies as $agency): ?>
                    <option value="<?= $agency['id'] ?>" <?= ($agency['id'] == $trip['agence_arrivee_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($agency['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_heure_depart" class="form-label">Date et heure de départ</label>
            <input type="datetime-local" name="date_heure_depart" id="date_heure_depart" class="form-control" 
                   value="<?= date('Y-m-d\TH:i', strtotime($trip['date_heure_depart'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="date_heure_arrivee" class="form-label">Date et heure d'arrivée</label>
            <input type="datetime-local" name="date_heure_arrivee" id="date_heure_arrivee" class="form-control" 
                   value="<?= date('Y-m-d\TH:i', strtotime($trip['date_heure_arrivee'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="places_totales" class="form-label">Nombre total de places</label>
            <input type="number" name="places_totales" id="places_totales" class="form-control" 
                   value="<?= htmlspecialchars($trip['places_totales']) ?>" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer la modification</button>
        <a href="index.php?page=home" class="btn btn-secondary">Annuler</a>
    </form>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>