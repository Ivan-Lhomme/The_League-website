<?php
class PageController extends AbstractController {
    public function home(){
        require "templates/home.phtml";
    }
    public function match() {
        require "templates/match.phtml";
    }
    public function matchs() {
        require "templates/matches.phtml";
    }
    public function player() {
        require "templates/player.phtml";
    }
    public function players() {
        require "templates/players.phtml";
    }
    public function team() {
        require "templates/team.phtml";
    }
    public function teams() {
        require "templates/teams.phtml";
    }
}
