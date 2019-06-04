FROM ubuntu:19.04

ENV DEBIAN_FRONTEND=noninteractive
ENV PROTOC_GEN_PHP_GRPC 1.0.7
ENV PROTOC_VERSION 3.7.1

RUN apt-get update -y && apt-get install -y curl unzip zlib1g-dev git
RUN cd /tmp && \
    curl -sLO https://github.com/protocolbuffers/protobuf/releases/download/v$PROTOC_VERSION/protoc-$PROTOC_VERSION-linux-x86_64.zip && \
    unzip protoc-$PROTOC_VERSION-linux-x86_64.zip && \
    mv /tmp/bin/protoc /bin/protoc
RUN curl -sLO https://github.com/spiral/php-grpc/releases/download/v$PROTOC_GEN_PHP_GRPC/protoc-gen-php-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64.tar.gz && \
    tar -xvf protoc-gen-php-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64.tar.gz && \
    mv protoc-gen-php-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64/protoc-gen-php-grpc /bin/protoc-gen-php-grpc && \
    chmod +x /bin/protoc-gen-php-grpc