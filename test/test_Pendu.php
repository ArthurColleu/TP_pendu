<?php
require_once __DIR__. '/../vendor/autoload.php';
use App\MotADeviner;
$testListMot = ["jambon", "porte", "ecran", "table"];
$test = new MotADeviner($testListMot);
echo $test->getMot();
