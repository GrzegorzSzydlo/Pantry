<?php

class Items{
    private $nameProduct;
    private $amount;
    private $image;
    private $id;


    public function __construct($nameProduct, $image,$amount=0,$id=null )
    {
        $this->nameProduct = $nameProduct;
        $this->amount = $amount;
        $this->id = $id;
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

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount): void
    {
        $this->amount = $amount;
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

}