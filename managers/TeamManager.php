<?php
class TeamManager extends AbstractManager{
    public function findOne(int $id) : Team {
        $query = $this->db->prepare("SELECT * FROM teams WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $team_data = $query->fetch(PDO::FETCH_ASSOC);
        $mediaManager = new MediaManager;

        $image = $mediaManager->findOne($team_data["id"]);
        $team = new Player($team_data["name"], $team_data["description"], $image);
        $team->setId($team_data["id"]);

        return $team;
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM teams");
        $query->execute();

        $teams_data = $query->fetchAll(PDO::FETCH_ASSOC);
        $teams = [];
        $mediaManager = new MediaManager;

        foreach ($teams_data as $team_data) {
            $image = $mediaManager->findOne($team_data["id"]);
            $p = new Player($team_data["name"], $team_data["description"], $image);
            $p->setId($team_data["id"]);
            $teams[] = $p;
        }

        return $teams;
    }
}