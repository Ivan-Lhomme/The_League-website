<?php
class PlayerManager extends AbstractManager{
    public function findOne(int $id) : array {
        $query = $this->db->prepare("SELECT * FROM players WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM players");
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}