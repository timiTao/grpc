#!/bin/bash
protoc --php_out=src/ --grpc_out=class_suffix=TimiTao\GRPC\PHPContract:src/ --plugin=protoc-gen-grpc=/bin/protoc-gen-php-grpc -I $PWD/../Contract/proto/ $PWD/../Contract/proto/*
