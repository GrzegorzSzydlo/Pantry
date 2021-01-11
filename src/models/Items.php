<?php

class Items{
    private $nameProduct;
    private $image;


    public function __construct($nameProduct, $image)
    {
        $this->nameProduct = $nameProduct;
        $this->image = $image;
    }

    public function getNameProduct()
    {
        return $this->nameProduct;
    }

    public function setNameProduct($nameProduct): void
    {
        $this->nameProduct = $nameProduct;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

}