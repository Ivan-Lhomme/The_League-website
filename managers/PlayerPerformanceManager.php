<?php
class PlayerPerformanceManager extends AbstractManager{
    public function findOne(int $id) : PlayerPerf {
        $query = $this->db->prepare("SELECT * FROM player_performance WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $playerPerf_data = $query->fetch(PDO::FETCH_ASSOC);
        $gameManager = new GamesManager;

        return new PlayerPerf($gameManager->findOne($playerPerf_data["game"]), $playerPerf_data["points"], $playerPerf_data["assists"]);
    }
    public function findAll(int $playerId) : array {
        $query = $this->db->prepare("SELECT * FROM player_performance WHERE player = :playerId");
        $parameters = [
            "playerId" => $playerId
        ];
        $query->execute($parameters);
        $playerPerfs_data = $query->fetchAll(PDO::FETCH_ASSOC);
        $playerPerfs = [];
        $gameManager = new GamesManager;

        foreach($playerPerfs_data as $playerPerf_data) {
            $playerPerf = new PlayerPerf($gameManager->findOne($playerPerf_data["game"]), $playerPerf_data["points"], $playerPerf_data["assists"]);
            $playerPerfs[] = $playerPerf;
        }

        return $playerPerfs;
    }
}