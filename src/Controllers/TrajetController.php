<?php

class TrajetController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        echo "La méthode index du contrôleur est atteinte !";
    }
}