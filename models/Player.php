<?php
class Player{
    private int $id;
    private array $stats;
    
    public function __construct(private string $nickname, private string $bio, private Image $image, private array $team) {}

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getNickname()
    {
        return $this->nickname;
    }
    public function setNickname($nickname)
    {
        return $this->nickname = $nickname;
    }

    public function getBio()
    {
        return $this->bio;
    }
    public function setBio($bio)
    {
        return $this->bio = $bio;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        return $this->image = $image;
    }

    public function getTeam()
    {
        return $this->team;
    }
    public function setTeam($team)
    {
        return $this->team = $team;
    }

    public function getStats()
    {
        return $this->stats;
    }
    public function setStats($stats)
    {
        return $this->stats = $stats;
    }
}