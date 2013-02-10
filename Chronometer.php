<?php
/**
 * This is a very simple class to measure time between two points in your php code.
 * Just like a regular
 * User: Lieven Vaneeckhaute
 * Date: 1/02/13
 * Time: 20:52
 */
class Chronometer
{
    private $accummulatedTime = 0;
    private $lastStartTime = null;

    private $chronometerRunning = false;

    public function start()
    {
        if ($this->chronometerRunning)
        {
            throw new Exception("Chronometer already running.");
        }
        $this->chronometerRunning = true;
        $this->lastStartTime = $this->microtime_float();

    }

    public function stop()
    {

        if (!$this->chronometerRunning)
        {
            throw new Exception("Chronometer has already stopped.");
        }
        $this->chronometerRunning = false;
        $now = $this->microtime_float();
        $this->accummulatedTime += $now - $this->lastStartTime ;

    }

    public function getElapsedTime()
    {
        return $this->accummulatedTime;
    }

    private function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

}
