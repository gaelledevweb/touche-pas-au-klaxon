<?php
require_once __DIR__ . '/../Models/Trip.php';

class TrajetController {
    private Trip $tripModel;

    public function __construct(PDO $db) {
        $this->tripModel = new Trip($db);
    }

    public function index() {
        // Le contrôleur ne fait qu'appeler le modèle
        $trips = $this->tripModel->findAllAvailable();
        require_once __DIR__ . '/../Views/accueil.php';
    }
}