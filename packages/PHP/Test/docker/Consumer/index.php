<?php
/**
 *
 * This file is part of the Aggrego.
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

declare(strict_types = 1);

require getenv('VENDOR_AUTOLOAD');

use Spiral\Goridge;
use Spiral\GRPC\Server;
use Spiral\RoadRunner;
use TimiTao\GRPC\Contract\CalculatorInterface;
use TimiTao\GRPC\Server\Calculator;

$server = new Server();
$server->registerService(CalculatorInterface::class, new Calculator(__DIR__ . 'output'));
$w = new RoadRunner\Worker(new Goridge\StreamRelay(STDIN, STDOUT));
$server->serve($w);