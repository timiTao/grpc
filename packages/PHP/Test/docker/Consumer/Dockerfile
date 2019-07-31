FROM ubuntu:19.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get install -y curl unzip zlib1g-dev git php7.2-dev
ENV PROTOC_GEN_PHP_GRPC 1.0.7
RUN cd /tmp && curl -sLO https://github.com/spiral/php-grpc/releases/download/v$PROTOC_GEN_PHP_GRPC/rr-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64.tar.gz && \
    tar -xvf rr-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64.tar.gz && \
    mv rr-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64/rr-grpc /bin/rr-grpc && \
    chmod +x /bin/rr-grpc
