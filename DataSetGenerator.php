<?php

class DataSetGenerator
{
    private $nrOfCustomers = 2000;
    /**
     * @var array $products
     */
    private $products;
    const NR_PRODUCTS = 20;
    public function generate()
    {
        $this->products = $this->createRandomProducts();
        $customers = array();
        for ($i = 0; $i < $this->nrOfCustomers; $i++)
        {
            $customers[] = $this->createRandomCustomer();
        }
        return $customers;
    }

    private function createRandomCustomer()
    {
        $customer = new Customer();
        $customer->setName($this->randomName());
        $customer->setVatNumber($this->getRandomVatNumber());
        $nrInvoice = rand(1, 5);
        for ($i = 0; $i < $nrInvoice; $i++) {
            $invoices = array();
            $invoices[] = $this->createRandomInvoice();

        }
        $customer->setInvoices($invoices);
        return $customer;
    }

    private function getRandomVatNumber()
    {
        return substr(str_shuffle("0123456789"), 0, 10);
    }

    private function randomName()
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 30);
    }

    private function createRandomInvoice()
    {
        $invoice = new Invoice();
        $invoice->setDocumentReference($this->randomName());
        $date = new DateTime();
        $date->sub(new DateInterval("P".rand(1,5)."D"));
        $invoice->setDate($date);
        $invoiceLines = array();
        for ($i = 0; $i < rand(1,10);$i++)
        {
            $invoiceLines[] = $this->createRandomInvoiceLine();
        }
        $invoice->setInvoiceLines($invoiceLines);
        return $invoice;
    }

    /**
     * @return array products
     */
    private function createRandomProducts()
    {
        $products = array();
        for ($productCounter = 0;$productCounter<self::NR_PRODUCTS; $productCounter++ )
        {
            $product = new Product();
            $product->setName($this->randomName());
            $product->setPricePerUnit(rand(1,1000) / 100);
            $products[] = $product;
        }
        return $products;
    }


    private function createRandomInvoiceLine()
    {
        /**
         * @var \Product $product
         */
        $product = $this->products[rand(0,self::NR_PRODUCTS - 1)];
        $invoiceLine = new InvoiceLine();

        $invoiceLine->setLinePrice($product->getPricePerUnit());
        $invoiceLine->setProduct($product);
        $invoiceLine->setQuantity(rand(1,200));
        return $invoiceLine;
    }
}
