<?php
class PlayerManager extends AbstractManager{
    public function findOne(int $id) : Player {
        $query = $this->db->prepare("SELECT * FROM players WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        $player_data = $query->fetch(PDO::FETCH_ASSOC);
        $mediaManager = new MediaManager;

        $image = $mediaManager->findOne($player_data["id"]);
        $player = new Player($player_data["nickname"], $player_data["bio"], $image, $player_data["team"]);
        $player->setId($player_data["id"]);

        return $player;
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM players");
        $query->execute();

        $players_data = $query->fetchAll(PDO::FETCH_ASSOC);
        $players = [];
        $mediaManager = new MediaManager;
        
        foreach ($players_data as $player_data) {
            $image = $mediaManager->findOne($player_data["id"]);
            $p = new Player($player_data["nickname"], $player_data["bio"], $image, $player_data["team"]);
            $p->setId($player_data["id"]);
            $players[] = $p;
        }

        return $players;
    }
}