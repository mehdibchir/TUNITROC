<?php
class Event{
    private $id;
    private $nb;
    private $title;
    private $description;
    private $image;
    private $date;

    public function __construct($id, $title, $description, $image, $date,$nb)
    {
        $this->id = $id;
        $this->nb= $nb ; 
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->date = $date;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNb()
    {
        return $this->nb;
    }

    public function setNb($nb)
    {
        $this->nb = $nb;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function __toString()
    {
        return "Event [id=" . $this->id . ", title=" . $this->title . ", description=" . $this->description . ", image=" . $this->image . ", date=" . $this->date . "]";
    }



 
}

?>
