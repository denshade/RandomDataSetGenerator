<?php

class Invoice
{
    /**
     * @var array invoiceLines
     */
    public $invoiceLines; //public because of json_encode.
    public $documentReference;
    /**
     * @var DateTime date
     */
    public $date;

    /**
     * @return array
     */
    public function getInvoiceLines()
    {
        return $this->invoiceLines;
    }

    /**
     * @param array $invoiceLines
     */
    public function setInvoiceLines(array $invoiceLines)
    {
        $this->invoiceLines = $invoiceLines;
    }

    public function getDocumentReference()
    {
        return $this->documentReference;
    }

    public function setDocumentReference($documentReference)
    {
        $this->documentReference = $documentReference;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}
