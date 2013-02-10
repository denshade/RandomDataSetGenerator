<?php

class Customer
{
    public $_id;// :|  If an object is used, it may not have protected or private properties.
    public function __construct()
    {
        $this->_id = rand(1,25000);
    }
    public $name;
    public $vatNumber;

    public $invoices;


}
