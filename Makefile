#!/usr/bin/env make

-include .env
export

defaults: bash

composer-install:
	docker-compose run composer ./run-for-all.sh install --ignore-platform-reqs
composer-update:
	docker-compose run composer ./run-for-all.sh update --ignore-platform-reqs

run-test:
	docker-compose -f packages/PHP/Test/docker-compose.yml up

#
# Creating client
#
generate-client:
	docker-compose run \
	-e PROTO_PATH=/core/packages/Contract/proto \
	-e PROTO_FILE=/core/packages/Contract/proto/* \
	-e SRC_DIR=/core/packages/PHP/PHPContract/src \
	php_client_generator ./compile.sh

copy-contract:
	mkdir -p packages/PHP/PHPContract/proto \
	&& cp packages/Contract/proto/* packages/PHP/PHPContract/proto/
