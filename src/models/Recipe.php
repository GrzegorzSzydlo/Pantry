<?php


class Recipe
{
    private $title;
    private $description;
    private $image;
    private $id;
    private $id_assigned_by;


    public function __construct($title, $description, $image, $id_assigned_by, $id=null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->id_assigned_by = $id_assigned_by;
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getIdAssignedBy()
    {
        return $this->id_assigned_by;
    }

    public function setIdAssignedBy($id_assigned_by): void
    {
        $this->id_assigned_by = $id_assigned_by;
    }


}