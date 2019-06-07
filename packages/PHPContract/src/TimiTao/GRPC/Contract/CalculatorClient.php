<?php
// GENERATED CODE -- DO NOT EDIT!

namespace TimiTao\GRPC\Contract;

/**
 */
class CalculatorClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \TimiTao\GRPC\Contract\AddRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function add(\TimiTao\GRPC\Contract\AddRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/TimiTao.GRPC.Contract.Calculator/add',
        $argument,
        ['\TimiTao\GRPC\Contract\AddReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \TimiTao\GRPC\Contract\SubtractRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function subtract(\TimiTao\GRPC\Contract\SubtractRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/TimiTao.GRPC.Contract.Calculator/subtract',
        $argument,
        ['\TimiTao\GRPC\Contract\SubtractReply', 'decode'],
        $metadata, $options);
    }

}
