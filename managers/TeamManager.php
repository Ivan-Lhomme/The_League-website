<?php
class TeamManager extends AbstractManager{
    public function findOne(int $id) : Team {
        $query = $this->db->prepare("SELECT * FROM teams WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        $team_data = $query->fetch(PDO::FETCH_ASSOC);
        $mediaManager = new MediaManager;
        $playerManager = new PlayerManager;

        $image = $mediaManager->findOne($team_data["logo"]);
        $team = new Team($team_data["name"], $team_data["description"], $image, $playerManager->findTeam($team_data["id"]));
        $team->setId($team_data["id"]);

        return $team;
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM teams");
        $query->execute();

        $teams_data = $query->fetchAll(PDO::FETCH_ASSOC);
        $teams = [];
        $mediaManager = new MediaManager;
        $playerManager = new PlayerManager;

        foreach ($teams_data as $team_data) {
            $image = $mediaManager->findOne($team_data["logo"]);
            $t = new Team($team_data["name"], $team_data["description"], $image, $playerManager->findTeam($team_data["id"]));
            $t->setId($team_data["id"]);
            $teams[] = $t;
        }

        return $teams;
    }
}