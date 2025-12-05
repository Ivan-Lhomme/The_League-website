<?php
class Team{
    public function __construct(private int $id, private string $name, private string $description, private Image $logo) {}

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

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        return $this->description = $description;
    }

    public function getLogo()
    {
        return $this->logo;
    }
    public function setLogo($logo)
    {
        return $this->logo = $logo;
    }
}