<?php

require dirname(__FILE__) . '/vendor/autoload.php';

use TimiTao\GRPC\Contract\AddReply;
use TimiTao\GRPC\Contract\AddRequest;
use TimiTao\GRPC\Contract\CalculatorClient;

$client = new CalculatorClient("server:9001", [
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
