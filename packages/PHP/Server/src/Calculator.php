<?php

declare(strict_types = 1);

namespace TimiTao\GRPC\Server;

use Spiral\GRPC\ContextInterface;
use TimiTao\GRPC\Contract\AddReply;
use TimiTao\GRPC\Contract\AddRequest;
use TimiTao\GRPC\Contract\CalculatorInterface;
use TimiTao\GRPC\Contract\SubtractReply;
use TimiTao\GRPC\Contract\SubtractRequest;

class Calculator implements CalculatorInterface
{
    /** @var string */
    private $dir;

    public function __construct(string $dir)
    {
        $this->dir = $dir;
    }

    public function add(ContextInterface $ctx, AddRequest $in): AddReply
    {
        $sum = $in->getX() + $in->getY();
        return (new AddReply())->setSum($sum);
    }

    public function subtract(ContextInterface $ctx, SubtractRequest $in): SubtractReply
    {
        $diff = $in->getX() - $in->getY();
        return (new SubtractReply())->setDiff($diff);
    }
}
