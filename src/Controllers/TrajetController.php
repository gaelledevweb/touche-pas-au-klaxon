<?php
require_once __DIR__ . '/../Models/Trip.php';

/**
 * Contrôleur gérant les trajets
 */
class TrajetController
{
    private Trip $tripModel;

    public function __construct(PDO $db)
    {
        $this->tripModel = new Trip($db);
    }

    /**
     * Liste les trajets disponibles (accès public)
     */
    public function index()
    {
        $trips = $this->tripModel->findAllAvailable();
        require_once __DIR__ . '/../Views/accueil.php';
    }

    /**
     * Affiche les détails d'un trajet (accès public)
     */
    public function show(int $id): void
    {
        $trip = $this->tripModel->findById($id);
        if (!$trip) {
            die("Ce trajet n'existe pas.");
        }
        require_once __DIR__ . '/../Views/details.php';
    }

    /**
     * Affiche le formulaire de création (Accès protégé)
     */
    public function create()
    {
        // Vérification de la session
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        // Si connecté, on affiche la vue
        require_once __DIR__ . '/../Views/create.php';
    }

    /**
     * Enregistre le trajet en base de données
     */
    public function store()
    {
        // Sécurité : Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'depart' => $_POST['depart'],
                'arrivee' => $_POST['arrivee'],
                'date' => $_POST['date'],
                'places' => (int)$_POST['places'],
                'user_id' => $_SESSION['user']['id'] // On lie le trajet à l'utilisateur connecté
            ];

            // Appel au modèle (à créer dans Trip.php)
            $this->tripModel->create($data);

            header('Location: index.php?page=home');
            exit;
        }
    }   
}
