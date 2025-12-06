<?php
class PageController extends AbstractController {
    public function home() {
        $playerManager = new PlayerManager;
        $teamManager = new TeamManager;

        $featuredPlayerIds = [3, 14, 12]; /*transfered this from home.phtml to here*/
        $featuredPlayers = [];
        foreach ($featuredPlayerIds as $playerId) {
            $player = $playerManager->findOne($playerId);
            $featuredPlayers[] = $player;
        }
        $featuredTeamId = 1;  // Change to a valid team ID from your DB
        $featuredTeam = $teamManager->findOne($featuredTeamId);

        $featuredTeamIds = [1, 5]; /*fixed teams and players for the page*/
        $featuredTeams = [];
        foreach ($featuredTeamIds as $teamId) {
            $team = $teamManager->findOne($teamId);
            $featuredTeams[] = $team;
        }
        $this->render([
            'featuredPlayers' => $featuredPlayers, 'featuredTeams' => $featuredTeams, 'featuredTeam' => $featuredTeam], 'home');
    }
    public function match() {
        $this->render([], 'match');
    }
    public function matchs() {
        $this->render([], 'matchs');
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
