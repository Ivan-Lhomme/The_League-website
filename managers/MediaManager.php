<?php
class MediaManager extends AbstractManager{
    public function findOne(int $id) : Image {
        $query = $this->db->prepare("SELECT * FROM media WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $image_data = $query->fetch(PDO::FETCH_ASSOC);

        $image = new Image($image_data["url"], $image_data["alt"]);
        $image->setId($image_data["id"]);

        return $image;
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM media");
        $query->execute();

        $images_data = $query->fetchAll(PDO::FETCH_ASSOC);
        $images = [];

        foreach($images_data as $image_data) {
            $image = new Image($image_data["url"], $image_data["alt"]);
            $image->setId($image_data["id"]);
            $images[] = $image;
        }

        return $images;
    }
}