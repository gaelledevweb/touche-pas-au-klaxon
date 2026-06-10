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

    public function create(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $stmt = $this->db->query("SELECT * FROM agencies ORDER BY nom ASC");
        $agencies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../Views/create.php';
    }

    public function store(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'agence_depart_id'   => (int)$_POST['agence_depart_id'],
                'agence_arrivee_id'  => (int)$_POST['agence_arrivee_id'],
                'date_heure_depart'  => $_POST['date_heure_depart'],
                'date_heure_arrivee' => $_POST['date_heure_arrivee'],
                'places_totales'     => (int)$_POST['places_totales'],
                'auteur_id'          => $_SESSION['user']['id']
            ];

            if ($data['agence_depart_id'] === $data['agence_arrivee_id']) {
                die("Erreur : L'agence de départ et d'arrivée doivent être différentes.");
            }

            $this->tripModel->create($data);
            header('Location: index.php?page=home');
            exit;
        }
    }
}