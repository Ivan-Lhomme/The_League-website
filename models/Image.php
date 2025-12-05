<?php
class Image{
    private int $id;
    
    public function __construct(private string $url, private string $alt) { }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getUrl()
    {
        return $this->url;
    }
    public function setUrl($url)
    {
        return $this->url = $url;
    }

    public function getAlt()
    {
        return $this->alt;
    }
    public function setAlt($alt)
    {
        return $this->alt = $alt;
    }
}