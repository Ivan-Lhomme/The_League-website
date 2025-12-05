<?php
class Player{
    private int $id;
    
    public function __construct(private string $nickname, private string $bio, private Image $image, private string $teamName) {}

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

    public function getTeamName()
    {
        return $this->teamName;
    }
    public function setTeamName($teamName)
    {
        return $this->teamName = $teamName;
    }
}