<?php

function __autoload($class_name) {
    include $class_name . '.php';
}



$printer = new TimingPrinter();
$printer->printCalculations();