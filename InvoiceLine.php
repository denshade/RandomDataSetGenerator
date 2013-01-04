<?php

class InvoiceLine
{
    private $linePrice;
    /**
     * @var Product $product
     */
    private $product;
    private $quantity;

    public function getLinePrice()
    {
        return $this->linePrice;
    }

    public function setLinePrice($linePrice)
    {
        $this->linePrice = $linePrice;
    }

    /**
     * @return \Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param \Product $product
     */
    public function setProduct(\Product $product)
    {
        $this->product = $product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
