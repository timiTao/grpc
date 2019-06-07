FROM ubuntu:19.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get install -y curl unzip php7.2-dev zlib1g-dev git jq
RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /bin/composer

WORKDIR /app
