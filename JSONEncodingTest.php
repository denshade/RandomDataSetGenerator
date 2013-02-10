<?php
require_once("Product.php");
require_once("Invoice.php");
require_once("InvoiceLine.php");


class JSONEncodingTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function roundTripProduct()
    {
        $product = new Product();
        $product->name = "aa";
        $product->pricePerUnit = 2330;

        $c = json_encode($product);

        /**
         * @var $newProduct Product
         */
        $newProduct = json_decode($c);
        $this->assertEquals($product->name, $newProduct->name);
        $this->assertEquals($product->pricePerUnit, $newProduct->pricePerUnit);
    }
        /**
     * @test
     */
    public function roundTripInvoiceLine()
    {
        $product = new Product();
        $product->name = "aa";
        $product->pricePerUnit= 2330;

        $invoiceItem = new InvoiceLine();
        $invoiceItem->linePrice=200;
        $invoiceItem->quantity = 2;
        $invoiceItem->product = $product;

        $c = json_encode($invoiceItem);

        /**
         * @var $newInvoiceLine InvoiceLine
         */
        $newInvoiceLine = json_decode($c);

        $this->assertEquals($invoiceItem->linePrice, $newInvoiceLine->linePrice);
        $this->assertEquals($invoiceItem->quantity, $newInvoiceLine->quantity);
        $this->assertEquals($invoiceItem->product->pricePerUnit, $newInvoiceLine->product->pricePerUnit);
        $this->assertEquals($invoiceItem->product->name, $newInvoiceLine->product->name);
    }
}
