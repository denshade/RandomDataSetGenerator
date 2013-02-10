<?php
require_once("Chronometer.php");

class ChronometerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     **/
    public function checkAccummulates()
    {
        $chronoMeter = new Chronometer();
        $chronoMeter->start();
        sleep(1);
        $chronoMeter->stop();
        $this->assertTrue($chronoMeter->getElapsedTime() > 0.9);
        $chronoMeter->start();
        sleep(2);
        $chronoMeter->stop();
        $this->assertTrue($chronoMeter->getElapsedTime() > 2 + 0.9);

    }

}
