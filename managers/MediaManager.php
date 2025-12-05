<?php
class MediaManager extends AbstractManager{
    public function findOne(int $id) : array {
        $query = $this->db->prepare("SELECT * FROM media WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM media");
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}