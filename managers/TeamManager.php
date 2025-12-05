<?php
class TeamManager extends AbstractManager{
    public function findOne(int $id) : array {
        $query = $this->db->prepare("SELECT * FROM teams WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM teams");
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}