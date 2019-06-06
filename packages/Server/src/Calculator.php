<?php

declare(strict_types = 1);

namespace Timitao\GRPC\Server;

use Spiral\GRPC;
use TimiTao\GRPC\Contract\AddReply;
use TimiTao\GRPC\Contract\AddRequest;
use TimiTao\GRPC\Contract\CalculatorInterface;
use TimiTao\GRPC\Contract\SubtractReply;
use TimiTao\GRPC\Contract\SubtractRequest;

class Calculator implements CalculatorInterface
{
    /**
     * @param GRPC\ContextInterface $ctx
     * @param AddRequest $in
     * @return AddReply
     *
     * @throws GRPC\Exception\InvokeException
     */
    public function add(GRPC\ContextInterface $ctx, AddRequest $in): AddReply
    {
        $sum = $in->getX() + $in->getY();

        return (new AddReply())->setSum($sum);
    }

    /**
     * @param GRPC\ContextInterface $ctx
     * @param SubtractRequest $in
     * @return SubtractReply
     *
     * @throws GRPC\Exception\InvokeException
     */
    public function subtract(GRPC\ContextInterface $ctx, SubtractRequest $in): SubtractReply
    {
        $diff = $in->getX() - $in->getY();

        return (new SubtractReply())->setDiff($diff);
    }
}
