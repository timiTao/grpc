FROM ubuntu:19.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get install -y unzip php7.2-dev zlib1g-dev autoconf
RUN pecl install grpc
RUN echo 'extension=grpc.so' > /etc/php/7.2/php.ini
RUN pecl install protobuf
RUN echo 'extension=protobuf.so' >> /etc/php/7.2/php.ini