<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dS
 * Date: 31/01/13
 * Time: 20:31
 * To change this template use File | Settings | File Templates.
 */
class TimingPrinter
{
    private $customers;

    public function printCalculations()
    {
        $this->initializeScenario();
        $this->printCalculationsForMysql();
        $this->printCalculationsForMongoDb();

    }
    private function printCalculationsForMysql()
    {
        $speeds = array();
        $start = $this->microtime_float();
        $this->doInsertsMysql();
        $end = $this->microtime_float();
        $speeds["insert"] = $end - $start;
        $start = $this->microtime_float();
        $this->doUpdatesMysql();
        $end = $this->microtime_float();
        $speeds["update"] = $end - $start;
        $start = $this->microtime_float();
        $this->doDeletesMysql();
        $end = $this->microtime_float();
        $speeds["delete"] = $end - $start;
        var_dump($speeds);
        return $speeds;
    }


    private function printCalculationsForMongoDb()
    {
        $timingGenerator = new MongoDbTimingGenerator($this->customers);
        $timingGenerator->printCalculations();

    }
    private function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    private function initializeScenario()
    {
        $dataSetGenerator = new DataSetGenerator();
        $this->customers = $dataSetGenerator->generate();
    }


    private function doInsertsMysql()
    {
    }

    private function doUpdatesMysql()
    {
    }

    private function doDeletesMysql()
    {
    }
}
