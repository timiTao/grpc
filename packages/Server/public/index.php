<?php

use Spiral\Goridge;
use Spiral\GRPC\Server;
use Spiral\RoadRunner;
use TimiTao\GRPC\Contract\CalculatorInterface;
use Timitao\GRPC\Server\Calculator;

ini_set('display_errors', 'stderr');
require "vendor/autoload.php";

$server = new Server();
$server->registerService(CalculatorInterface::class, new Calculator());
$w = new RoadRunner\Worker(new Goridge\StreamRelay(STDIN, STDOUT));
$server->serve($w);