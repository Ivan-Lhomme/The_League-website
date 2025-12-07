<?php
class PageController extends AbstractController {
    public function home() {
        $playerManager = new PlayerManager;
        $teamManager = new TeamManager;
        $gamesManager = new GamesManager;

        $featuredPlayerIds = [3, 14, 12]; /*transfered this from home.phtml to here*/
        $featuredPlayers = [];
        foreach ($featuredPlayerIds as $playerId) {
            $player = $playerManager->findOne($playerId);
            $featuredPlayers[] = $player;
        }
        $featuredTeamId = 1;  // Change to a valid team ID from your DB
        $featuredTeam = $teamManager->findOne($featuredTeamId);
        $lastGame = $gamesManager->findLast();

        $this->render(['featuredPlayers' => $featuredPlayers, 'lastGame' => $lastGame, 'featuredTeam' => $featuredTeam], 'home');
    }
    public function match(int $id)
    {
        $gamesManager = new GamesManager;
        $playerManager = new PlayerManager;
        $playerPerformanceManager = new PlayerPerformanceManager;

        $game = $gamesManager->findOne($id);
        $allPlayers = $playerManager->findAll();

        $team1Players = [];
        $team2Players = [];

        foreach ($allPlayers as $p) {
            if ($p->getTeam()['id'] == $game->getTeam_1()->getId()) {
                $team1Players[] = $p;
            }
            if ($p->getTeam()['id'] == $game->getTeam_2()->getId()) {
                $team2Players[] = $p;
            }
        }
        foreach ($team1Players as $p) {
            $p->setStats($playerPerformanceManager->findAll($p->getId()));
        }
        foreach ($team2Players as $p) {
            $p->setStats($playerPerformanceManager->findAll($p->getId()));
        }
        $this->render(["game" => $game, "team1Players" => $team1Players, "team2Players" => $team2Players], "match");
    }


    public function matchs() {
        $gamesManager = new GamesManager;
        $this->render($gamesManager->findAll(), 'matchs');
    }
    public function player(int $id) {
        $playerManager = new PlayerManager;
        $playerPerformanceManager = new PlayerPerformanceManager;

        $player = $playerManager->findOne($id);
        $player->setStats($playerPerformanceManager->findAll($player->getId()));

        $teammates = $playerManager->findTeam($player->getTeam()["id"]);
        $data = [
            "player" => $player,
            "teammates" => $teammates
        ];

        $this->render($data, 'player');
    }
    public function players() {
        $playerManager = new PlayerManager;
        $this->render($playerManager->findAll(), 'players');
    }
    public function team($teamId) {
        $teamManager = new TeamManager;
        $this->render([$teamManager->findOne($teamId)], 'team');
    }
    public function teams() {
        $teamManager = new TeamManager;
        $this->render($teamManager->findAll(), 'teams');
    }
}
