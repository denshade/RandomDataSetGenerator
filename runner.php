<?php

ini_set('date.timezone','Europe/Brussels');

function __autoload($class_name) {
    include $class_name . '.php';
}

$gen = new DataSetGenerator();
var_dump($gen->generate());