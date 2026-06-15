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
        // Supposons que findAllAvailable() retourne les trajets avec les infos nécessaires
        $trips = $this->tripModel->findAllAvailable();
        require_once __DIR__ . '/../Views/accueil.php';
    }

    // Affiche les détails d'un trajet
    public function show(int $id): void
    {
        $trip = $this->tripModel->findById($id);
        require_once __DIR__ . '/../Views/details.php';
    }

    // Affiche le formulaire de modification
    public function edit(int $id): void
    {
        $trip = $this->tripModel->findById($id);

        // Vérification : seul l'auteur peut modifier
        if (!$trip || $trip['auteur_id'] != ($_SESSION['user']['id'] ?? 0)) {
            header('Location: index.php?page=home');
            exit;
        }

        // Récupérer la liste des agences pour les menus déroulants
        $agencies = $this->db->query("SELECT * FROM agencies")->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../Views/edit.php';
    }

    // Supprime le trajet
    public function delete(int $id): void
    {
        $trip = $this->tripModel->findById($id);

        // Vérification : seul l'auteur peut supprimer
        if ($trip && $trip['auteur_id'] == ($_SESSION['user']['id'] ?? 0)) {
            $stmt = $this->db->prepare("DELETE FROM trips WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }

        header('Location: index.php?page=home');
        exit;
    }

    public function create(): void
    {
        $agencies = $this->db->query("SELECT * FROM agencies")->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/create.php';
    }

    public function store(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql = "INSERT INTO trips (agence_depart_id, agence_arrivee_id, date_heure_depart, date_heure_arrivee, places_totales, places_disponibles, auteur_id) 
                    VALUES (:dep, :arr, :date_dep, :date_arr, :places, :places, :auteur)";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'dep'      => $_POST['agence_depart_id'],
                'arr'      => $_POST['agence_arrivee_id'],
                'date_dep' => $_POST['date_heure_depart'],
                'date_arr' => $_POST['date_heure_arrivee'],
                'places'   => $_POST['places_totales'],
                'auteur'   => $_SESSION['user']['id']
            ]);

            header('Location: index.php?page=home');
            exit;
        }
    }

    // Administrateur

    // Dashboard
    public function adminDashboard(): void
    {
        $this->checkAdmin();
        $nbUsers = $this->db->query("SELECT COUNT(*) FROM users")->fetchColumn();
        $nbAgencies = $this->db->query("SELECT COUNT(*) FROM agencies")->fetchColumn();
        $nbTrips = $this->db->query("SELECT COUNT(*) FROM trips")->fetchColumn();
        $this->checkAdmin();

        // Récupération des compteurs pour les cartes
        $nbUsers = $this->db->query("SELECT COUNT(*) FROM users")->fetchColumn();
        $nbAgencies = $this->db->query("SELECT COUNT(*) FROM agencies")->fetchColumn();
        $nbTrips = $this->db->query("SELECT COUNT(*) FROM trips")->fetchColumn();

        // Récupération des LISTES pour le tableau
        $users = $this->db->query("SELECT id, email, role FROM users")->fetchAll(PDO::FETCH_ASSOC);
        $agencies = $this->db->query("SELECT id, nom FROM agencies")->fetchAll(PDO::FETCH_ASSOC);
        $trips = $this->db->query("SELECT t.id, ad.nom as depart, aa.nom as arrivee FROM trips t 
                               JOIN agencies ad ON t.agence_depart_id = ad.id 
                               JOIN agencies aa ON t.agence_arrivee_id = aa.id")->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }


    // Agences
    public function listAgencies(): void
    {
        $this->checkAdmin();
        $agencies = $this->db->query("SELECT * FROM agencies")->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/admin/admin_agencies.php';
    }

    public function editAgency(int $id): void
    {
        $this->checkAdmin();
        $stmt = $this->db->prepare("SELECT * FROM agencies WHERE id = ?");
        $stmt->execute([$id]);
        $agency = $stmt->fetch(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/admin/admin_edit_agency.php';
    }

    public function updateAgency(int $id): void
    {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->db->prepare("UPDATE agencies SET nom = ? WHERE id = ?")->execute([$_POST['nom'], $id]);
        }
        header('Location: index.php?page=admin_agencies');
        exit;
    }

    private function checkAdmin(): void
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: index.php?page=login');
            exit;
        }
    }

    public function listUsers(): void
    {
        $this->checkAdmin();
        $users = $this->db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/admin/admin_users.php';
    }

    public function deleteUser(int $id): void
    {
        $this->checkAdmin();
        $this->db->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);
        header('Location: index.php?page=admin_users');
        exit;
    }

    public function deleteAgency(int $id): void
    {
        $this->checkAdmin();
        $this->db->prepare("DELETE FROM agencies WHERE id = ?")->execute([$id]);
        header('Location: index.php?page=admin_agencies');
        exit;
    }

    public function listTrips(): void
    {
        $this->checkAdmin();
        $sql = "SELECT t.*, ad.nom as nom_depart, aa.nom as nom_arrivee FROM trips t 
                JOIN agencies ad ON t.agence_depart_id = ad.id 
                JOIN agencies aa ON t.agence_arrivee_id = aa.id";
        $trips = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/admin/admin_trips.php';
    }

    public function deleteTrip(int $id): void
    {
        $this->checkAdmin();
        $this->db->prepare("DELETE FROM trips WHERE id = ?")->execute([$id]);
        header('Location: index.php?page=admin_trips');
        exit;
    }

    // Affiche le formulaire d'ajout
    public function createAgency(): void
    {
        $this->checkAdmin();
        require_once __DIR__ . '/../Views/admin/admin_add_agency.php';
    }

    // Enregistre l'agence en base de données
    public function storeAgency(): void
    {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nom'])) {
            $stmt = $this->db->prepare("INSERT INTO agencies (nom) VALUES (?)");
            $stmt->execute([$_POST['nom']]);
        }
        header('Location: index.php?page=admin_agencies');
        exit;
    }
}
