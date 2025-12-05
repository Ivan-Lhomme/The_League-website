<?php
class Router{
    public function handle($get) {
        $page = new PageController;

        if (isset($get["route"])) {
            if ($get["route"] === "teams") {
                $page->teams();
            } else if ($get["route"] === "players") {
                $page->players();
            } else if ($get["route"] === "matchs") {
                $page->matchs();
            } else if ($get["route"] === "team") {
                $page->team($get["teamId"]);
            } else if ($get["route"] === "player") {
                $page->player();
            } else if ($get["route"] === "match") {
                $page->match();
            }
        } else {
            $page->home();
        }
    }
}