<?php
class Games{
    public function __construct(private int $id, private string $name, private DateTime $date, private Team $team_1, private Team $team_2, private int $winner) {}

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        return $this->name = $name;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        return $this->date = $date;
    }

    public function getTeam_1()
    {
        return $this->team_1;
    }
    public function setTeam_1($team_1)
    {
        return $this->team_1 = $team_1;
    }

    public function getTeam_2()
    {
        return $this->team_2;
    }
    public function setTeam_2($team_2)
    {
        return $this->team_2 = $team_2;
    }

    public function getWinner()
    {
        return $this->winner;
    }
    public function setWinner($winner)
    {
        return $this->winner = $winner;
    }
}