#!/bin/bash
PROTOFILE="${CONSUMER_PROTOFILE}"
rr-grpc serve -v -d -o grpc.proto=$PROTOFILE