<?php

class Customer
{
    private $name;
    private $vatNumber;

    private $invoices;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;
    }

    public function getInvoices()
    {
        return $this->invoices;
    }

    public function setInvoices(array $invoices)
    {
        $this->invoices = $invoices;
    }


}
