<?php

class MongoDbTimingGenerator
{
    private $customers;
    private $mongoClient;
    private $db;
    private $collection;
    public function __construct(array $customers)
    {
        $this->customers = $customers;
        $this->mongoClient = new MongoClient();
        $this->db = $this->mongoClient->foo;
        $this->db->drop();
        $this->collection = $this->db->selectCollection("myCollection");
    }

    private function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    public function printCalculations()
    {
        $meter = new Chronometer();
        $speeds = array();

        $meter->start();
        $this->doInsertsMongoDb();
        $meter->stop();
        $speeds["insert"] = $meter->getElapsedTime();

        $meter->start();
        $this->doSelectByName();
        $meter->stop();
        $speeds["select"] = $meter->getElapsedTime();


        $meter->start();
        $this->doUpdatesMongoDb();
        $meter->stop();
        $speeds["update"] = $meter->getElapsedTime();

        $meter->start();
        $this->doDeletesMongoDb();
        $meter->stop();
        $speeds["delete"] = $meter->getElapsedTime();

        var_dump($speeds);
        return $speeds;
    }

    private function doInsertsMongoDb()
    {
        foreach($this->customers as $customer)
        {
            $this->collection->insert(array($customer->_id,json_encode($customer)));
        }
    }

    private function doUpdatesMongoDb()
    {
    }

    private function doDeletesMongoDb()
    {
    }

    private function doSelectByName()
    {
        $cursor = $this->collection->find();
        foreach ($cursor as $doc) {
            var_dump($doc[1]);
        }

    }

}
