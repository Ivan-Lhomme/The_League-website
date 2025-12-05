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
        $this->render([], 'players');
    }
    public function team() {
        $this->render([], 'team');
    }
    public function teams() {
        $teamManager = new TeamManager;
        $this->render($teamManager->findAll(), 'teams');
    }
}
