<?php
# Generated by the protocol buffer compiler (spiral/php-grpc). DO NOT EDIT!
# source: service.proto

namespace TimiTao\GRPC\Contract;

use Spiral\GRPC;

interface CalculatorInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "TimiTao.GRPC.Contract.Calculator";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param AddRequest $in
    * @return AddReply
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function add(GRPC\ContextInterface $ctx, AddRequest $in): AddReply;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param SubtractRequest $in
    * @return SubtractReply
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function subtract(GRPC\ContextInterface $ctx, SubtractRequest $in): SubtractReply;
}
