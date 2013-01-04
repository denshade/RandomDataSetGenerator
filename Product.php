<?php

class Product
{
    private $name;
    private $pricePerUnit;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPricePerUnit()
    {
        return $this->pricePerUnit;
    }

    public function setPricePerUnit($pricePerUnit)
    {
        $this->pricePerUnit = $pricePerUnit;
    }

}
