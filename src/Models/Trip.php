<?php

class Trip
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Enregistre un nouveau trajet en base de données
     * @param array $data Données du formulaire
     */
    public function create(array $data): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO trips (depart, arrivee, date, places, user_id) 
            VALUES (:depart, :arrivee, :date, :places, :user_id)
        ");

        return $stmt->execute([
            'depart'  => $data['depart'],
            'arrivee' => $data['arrivee'],
            'date'    => $data['date'],
            'places'  => $data['places'],
            'user_id' => $data['user_id']
        ]);
    }

    public function findAllAvailable(): array
    {
        $sql = "SELECT t.*, a1.nom as depart, a2.nom as arrivee 
                FROM trips t
                JOIN agencies a1 ON t.agence_depart_id = a1.id
                JOIN agencies a2 ON t.agence_arrivee_id = a2.id
                WHERE t.places_disponibles > 0 
                ORDER BY t.date_heure_depart ASC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $sql = "SELECT t.*, a1.nom as depart, a2.nom as arrivee 
                FROM trips t
                JOIN agencies a1 ON t.agence_depart_id = a1.id
                JOIN agencies a2 ON t.agence_arrivee_id = a2.id
                WHERE t.id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}
