<?php
class PlayerPerformanceManager extends AbstractManager{
    public function findOne(int $id) : array {
        $query = $this->db->prepare("SELECT * FROM players_performance WHERE id = :id");
        $parameters = [players_performance
            "id" => $id
        ];
        $query->execute($parameters);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM players_performance");
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}