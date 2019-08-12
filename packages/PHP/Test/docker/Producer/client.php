<?php

declare(strict_types = 1);

require getenv('VENDOR_AUTOLOAD');

use TimiTao\GRPC\Contract\AddReply;
use TimiTao\GRPC\Contract\AddRequest;
use TimiTao\GRPC\Contract\CalculatorClient;
use TimiTao\GRPC\Contract\SubtractReply;
use TimiTao\GRPC\Contract\SubtractRequest;

$server = getenv('CONSUMER_HOST');
$port = getenv('CONSUMER_PORT');
$inputFile = getenv('PRODUCER_INPUT_FILE');
$outputFile = getenv('PRODUCER_OUTPUT_FILE');

$client = new CalculatorClient(sprintf('%s:%s', $server, $port), [
    "credentials" => Grpc\ChannelCredentials::createInsecure(),
]);

function testAdd(CalculatorClient $client, int $x, int $y, int $expectedResult): bool
{
    $request = (new AddRequest())->setX($x)->setY($y);
    /** @var AddReply $response */
    $response = $client->add($request)->wait()[0];
    echo "Response: SUM " . $response->getSum() . "\n";
    return $response->getSum() === $expectedResult;
}

function testSub(CalculatorClient $client, int $x, int $y, int $expectedResult): bool
{
    $request = (new SubtractRequest())->setX($x)->setY($y);
    /** @var SubtractReply $response */
    $response = $client->subtract($request)->wait()[0];
    echo "Response: SUB " . $response->getDiff() . "\n";
    return $response->getDiff() === $expectedResult;
}

$data = require $inputFile;
$endLimit = 1000;
$start = microtime(true);
foreach ($data as $key => $row) {
    switch ($row['ACTION']) {
        case 'ADD':
            $response = testAdd($client, $row['X'], $row['Y'], $row['EXPECTED']);
            break;
        case 'SUB':
            $response = testSub($client, $row['X'], $row['Y'], $row['EXPECTED']);
            break;
        default:
            throw new RuntimeException('Unknown request data: ' . print_r($row['ACTION'], true));
    }
    $data[$key]['RESULT'] = $response;
}
$end = microtime(true);
$time = ($end - $start) * 1000;
echo(sprintf("Took %d ms for %d synchronous calls\n", $time, $endLimit));

file_put_contents($outputFile, sprintf("<?php \n return %s; \n", var_export($data, true)));