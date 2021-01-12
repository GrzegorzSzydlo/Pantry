<?php

class Items{
    private $nameProduct;
    private $amount;


    public function __construct($nameProduct, $amount)
    {
        $this->nameProduct = $nameProduct;
        $this->amount = $amount;
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

}