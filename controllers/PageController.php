<?php
class PageController extends AbstractController {
    public function home(){
        $this->render([], 'home');
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
