<?php
class GamesManager extends AbstractManager{
    public function findOne(int $id) : Games {
        $query = $this->db->prepare("SELECT * FROM games WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        $game_data = $query->fetch(PDO::FETCH_ASSOC);
        $teamManager = new TeamManager;

        $game = new Games($game_data["name"], new DateTime($game_data["date"]), $teamManager->findOne($game_data["team_1"]), $teamManager->findOne($game_data["team_2"]), $game_data["winner"]);
        $game->setId($game_data["id"]);
        return $game;
    }
    public function findAll() : array {
        $query = $this->db->prepare("SELECT * FROM games");
        $query->execute();

        $games_data = $query->fetchAll(PDO::FETCH_ASSOC);
        $games = [];
        $teamManager = new TeamManager;

        foreach($games_data as $game_data) {
            $game = new Games($game_data["name"], new DateTime($game_data["date"]), $teamManager->findOne($game_data["team_1"]), $teamManager->findOne($game_data["team_2"]), $game_data["winner"]);
            $game->setId($game_data["id"]);
            $games[] = $game;
        }

        return $games;
    }

    public function findLast() {
        $query = $this->db->prepare("SELECT * FROM games ORDER BY date DESC LIMIT 1");
        $query->execute();

        $game_data = $query->fetch(PDO::FETCH_ASSOC);
        $teamManager = new TeamManager;

        $game = new Games($game_data["name"], new DateTime($game_data["date"]), $teamManager->findOne($game_data["team_1"]), $teamManager->findOne($game_data["team_2"]), $game_data["winner"]);
        $game->setId($game_data["id"]);
        return $game;
    }
}