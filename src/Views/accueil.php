<?php
require_once __DIR__ . '/includes/header.php';
?>

<div class="container mt-4">
    <h2 class="mb-4">Trajets disponibles</h2>

   <table class="table table-hover align-middle border bg-white">
        <thead class="table-light">
            <tr>
                <th>Départ</th>
                <th>Arrivée</th>
                <th>Date</th>
                <th>Places</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trips as $trip): ?>
                <tr>
                    <td><?= htmlspecialchars($trip['depart'] ?? '') ?></td>
                    <td><?= htmlspecialchars($trip['arrivee'] ?? '') ?></td>
                    <td><?= isset($trip['date_heure_depart']) ? date('d/m/Y H:i', strtotime($trip['date_heure_depart'])) : '' ?></td>
                    <td><?= htmlspecialchars($trip['places_disponibles'] ?? 0) ?> / <?= htmlspecialchars($trip['places_totales'] ?? 0) ?></td>
                    <td>
                        <a href="index.php?page=details&id=<?= $trip['id'] ?>" class="text-primary me-2" title="Voir">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <?php if (isset($_SESSION['user']) && isset($trip['auteur_id']) && $_SESSION['user']['id'] == $trip['auteur_id']): ?>
                            <a href="index.php?page=edit&id=<?= $trip['id'] ?>" class="text-warning me-2" title="Modifier">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="index.php?page=delete&id=<?= $trip['id'] ?>" class="text-danger" title="Supprimer" onclick="return confirm('Confirmer la suppression ?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bienvenue !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['user']['nom'] ?? '') . ' ' . htmlspecialchars($_SESSION['user']['prenom'] ?? '') ?></p>
        <p><strong>Téléphone :</strong> <?= htmlspecialchars($_SESSION['user']['telephone'] ?? 'Non renseigné') ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?></p>
      </div>
      <div class="modal-footer d-flex justify-content-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php if (isset($_SESSION['login_success'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('userModal'));
            myModal.show();
        });
    </script>
    <?php unset($_SESSION['login_success']); endif; ?>


<?php
require_once __DIR__ . '/includes/footer.php';
?>
</body>

</html>