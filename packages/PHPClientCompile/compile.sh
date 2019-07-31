#!/bin/bash

PROTO_PATH="${PROTO_PATH}"
PROTO_FILE="${PROTO_FILE}"
SRC_DIR="${SRC_DIR}"

protoc --php_out=$SRC_DIR --grpc_out=$SRC_DIR --plugin=protoc-gen-grpc=/bin/grpc_php_plugin --proto_path=$PROTO_PATH $PROTO_FILE
protoc --php_out=$SRC_DIR --php-grpc_out=$SRC_DIR --proto_path=$PROTO_PATH $PROTO_FILE