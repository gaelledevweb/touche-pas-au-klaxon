<?php
require_once __DIR__ . '/../Models/Trip.php';

class TrajetController
{
    private Trip $tripModel;

    public function __construct(PDO $db)
    {
        $this->tripModel = new Trip($db);
    }

    public function index()
    {
        $trips = $this->tripModel->findAllAvailable();
        require_once __DIR__ . '/../Views/accueil.php';
    }

    public function show(int $id): void
    {
        $trip = $this->tripModel->findById($id);

        if (!$trip) {
            // gestion d'erreur si l'ID n'existe pas
            die("Ce trajet n'existe pas.");
        }

        require_once __DIR__ . '/../Views/details.php';
    }
}
