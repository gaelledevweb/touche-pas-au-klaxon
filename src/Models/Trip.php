<?php

class Trip {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Récupère tous les trajets disponibles avec les noms des agences
     */
    public function findAllAvailable(): array {
        // Jointure pour avoir les noms des agences au lieu des IDs
        $sql = "SELECT t.*, a1.nom as depart, a2.nom as arrivee 
                FROM trips t
                JOIN agencies a1 ON t.agence_depart_id = a1.id
                JOIN agencies a2 ON t.agence_arrivee_id = a2.id
                WHERE t.places_disponibles > 0 
                ORDER BY t.date_heure_depart ASC";
        
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}