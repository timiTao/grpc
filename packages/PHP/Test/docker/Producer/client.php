<?php

declare(strict_types = 1);

require getenv('VENDOR_AUTOLOAD');

use TimiTao\GRPC\Contract\AddReply;
use TimiTao\GRPC\Contract\AddRequest;
use TimiTao\GRPC\Contract\CalculatorClient;

$server = getenv('CONSUMER_HOST');
$port = getenv('CONSUMER_PORT');

$client = new CalculatorClient(sprintf('%s:%s', $server, $port), [
    "credentials" => Grpc\ChannelCredentials::createInsecure(),
]);

function testSync(CalculatorClient $client)
{
    $endLimit = 1000;
    $start = microtime(true);
    for ($i = 0; $i < $endLimit; ++$i) {
        $add = new AddRequest();
        $add->setX(1)->setY($i);

        /** @var AddReply $response */
        $response = $client->add($add)->wait()[0];
        echo "Response: SUM " . $response->getSum(). "\n";
        if ($i % 100 == 0) {
            echo("Sent $i requests\n");
        }
    }
    $end = microtime(true);
    $time = ($end - $start) * 1000;
    echo(sprintf("Took %d ms for %d synchronous calls\n", $time, $endLimit));
}

testSync($client);
