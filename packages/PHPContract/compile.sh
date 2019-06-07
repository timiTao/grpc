#!/bin/bash
# @TODO: generating namespace to have PSR-4 later --grpc_out=class_suffix=TimiTao\GRPC\Contract:src/  class_suffix|php_namespace

protoc --php_out=src/ --grpc_out=src/ --plugin=protoc-gen-grpc=/bin/grpc_php_plugin --proto_path=vendor/timitao/grpc-contract/proto/ vendor/timitao/grpc-contract/proto/*
protoc --php_out=src/ --php-grpc_out=src/ --proto_path=vendor/timitao/grpc-contract/proto/ vendor/timitao/grpc-contract/proto/*