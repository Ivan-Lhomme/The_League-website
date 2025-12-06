<?php
class PlayerPerf{
    private int $id;

    public function __construct(private Games $game, private int $points, private int $assists) {}

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getGame()
    {
        return $this->game;
    }
    public function setGame($game)
    {
        return $this->game = $game;
    }

    public function getPoints()
    {
        return $this->points;
    }
    public function setPoints($points)
    {
        return $this->points = $points;
    }

    public function getAssists()
    {
        return $this->assists;
    }
    public function setAssists($assists)
    {
        return $this->assists = $assists;
    }
}