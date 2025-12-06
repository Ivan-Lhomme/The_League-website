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

        $featuredTeamIds = [4, 1]; /*fixed teams and players for the page*/
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
    public function player() {
        $this->render([], 'player');
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
