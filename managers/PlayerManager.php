<?php
class PlayerManager extends AbstractManager{
    public function findOne(int $id) : Player {
        $query = $this->db->prepare("SELECT players.*, teams.name AS teamName FROM players JOIN teams ON players.team = teams.id WHERE players.id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        $player_data = $query->fetch(PDO::FETCH_ASSOC);
        $mediaManager = new MediaManager;

        $image = $mediaManager->findOne($player_data["portrait"]);
        $player = new Player($player_data["nickname"], $player_data["bio"], $image, $player_data["teamName"]);
        $player->setId($player_data["id"]);

        return $player;
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT players.*, teams.name AS teamName FROM players JOIN teams ON players.team = teams.id");
        $query->execute();

        $players_data = $query->fetchAll(PDO::FETCH_ASSOC);
        $players = [];
        $mediaManager = new MediaManager;
        
        foreach ($players_data as $player_data) {
            $image = $mediaManager->findOne($player_data["portrait"]);
            $p = new Player($player_data["nickname"], $player_data["bio"], $image, $player_data["teamName"]);
            $p->setId($player_data["id"]);
            $players[] = $p;
        }

        return $players;
    }
    public function findTeam(int $teamId) {
        $query = $this->db->prepare("SELECT players.*, teams.name AS teamName FROM players JOIN teams ON players.team = teams.id WHERE players.team = :teamId");
        $parameters = [
            "teamId" => $teamId
        ];
        $query->execute($parameters);

        $players_data = $query->fetchAll(PDO::FETCH_ASSOC);
        $players = [];
        $mediaManager = new MediaManager;
        
        foreach ($players_data as $player_data) {
            $image = $mediaManager->findOne($player_data["portrait"]);
            $p = new Player($player_data["nickname"], $player_data["bio"], $image, $player_data["teamName"]);
            $p->setId($player_data["id"]);
            $players[] = $p;
        }

        return $players;
    }
}