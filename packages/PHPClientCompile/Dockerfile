FROM ubuntu:19.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get install -y curl unzip zlib1g-dev git build-essential autogen autoconf libtool zlib1g-dev
ENV PROTOC_VERSION 3.9.0
RUN cd /tmp && \
    curl -sLO https://github.com/protocolbuffers/protobuf/releases/download/v$PROTOC_VERSION/protoc-$PROTOC_VERSION-linux-x86_64.zip && \
    unzip protoc-${PROTOC_VERSION}-linux-x86_64.zip && \
    mv /tmp/bin/protoc /bin/protoc
ENV PROTOC_GEN_PHP_GRPC 1.0.7
RUN curl -sLO https://github.com/spiral/php-grpc/releases/download/v$PROTOC_GEN_PHP_GRPC/protoc-gen-php-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64.tar.gz && \
    tar -xvf protoc-gen-php-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64.tar.gz && \
    mv protoc-gen-php-grpc-$PROTOC_GEN_PHP_GRPC-linux-amd64/protoc-gen-php-grpc /bin/protoc-gen-php-grpc && \
    chmod +x /bin/protoc-gen-php-grpc
RUN git clone -b $(curl -L https://grpc.io/release) https://github.com/grpc/grpc
RUN cd grpc && git submodule update --init && make grpc_php_plugin
RUN mv /grpc/bins/opt/grpc_php_plugin /bin/grpc_php_plugin
RUN rm -rf /grpc