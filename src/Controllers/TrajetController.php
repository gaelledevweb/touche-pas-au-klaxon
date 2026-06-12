<?php
require_once __DIR__ . '/../Models/Trip.php';

class TrajetController
{
    private Trip $tripModel;
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->tripModel = new Trip($db);
    }

    public function index(): void
    {
        $trips = $this->tripModel->findAllAvailable();
        require_once __DIR__ . '/../Views/accueil.php';
    }

    // Gestion Administrateur

    public function adminDashboard(): void
    {
        $this->checkAdmin();
        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }

    public function listTrips(): void
    {
        $this->checkAdmin();
        $sql = "SELECT t.*, ad.nom as nom_depart, aa.nom as nom_arrivee 
                FROM trips t
                JOIN agencies ad ON t.agence_depart_id = ad.id
                JOIN agencies aa ON t.agence_arrivee_id = aa.id
                ORDER BY t.date_heure_depart DESC";
        
        $trips = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/admin/admin_trips.php';
    }

    public function deleteTrip(?int $id): void
    {
        $this->checkAdmin();
        if ($id) {
            $stmt = $this->db->prepare("DELETE FROM trips WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
        header('Location: index.php?page=admin_trips');
        exit;
    }

    private function checkAdmin(): void
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: index.php?page=login');
            exit;
        }
    }

    // Gestion utilisateurs
    public function listUsers(): void
    {
        $this->checkAdmin();
        $users = $this->db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/admin/admin_users.php';
    }

    public function deleteUser(int $id): void
    {
        $this->checkAdmin();
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header('Location: index.php?page=admin_users');
        exit;
    }

    // Gestion agences
    public function listAgencies(): void
    {
        $this->checkAdmin();
        $agencies = $this->db->query("SELECT * FROM agencies")->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/admin/admin_agencies.php';
    }

    public function deleteAgency(int $id): void
    {
        $this->checkAdmin();
        $stmt = $this->db->prepare("DELETE FROM agencies WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header('Location: index.php?page=admin_agencies');
        exit;
    }

    // Gestion des agences (Création / Modification) ---

    public function createAgency(): void
    {
        $this->checkAdmin();
        require_once __DIR__ . '/../Views/admin/admin_add_agency.php';
    }

    public function storeAgency(): void
    {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->db->prepare("INSERT INTO agencies (nom) VALUES (:nom)");
            $stmt->execute(['nom' => $_POST['nom']]);
            header('Location: index.php?page=admin_agencies');
            exit;
        }
    }

    public function editAgency(int $id): void
    {
        $this->checkAdmin();
        $stmt = $this->db->prepare("SELECT * FROM agencies WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $agency = $stmt->fetch(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/admin/admin_edit_agency.php';
    }

    public function updateAgency(int $id): void
    {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->db->prepare("UPDATE agencies SET nom = :nom WHERE id = :id");
            $stmt->execute(['nom' => $_POST['nom'],'id' => $id]);
            header('Location: index.php?page=admin_agencies');
            exit;
        }
    }
}
