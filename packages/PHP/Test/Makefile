#!/usr/bin/env make

-include .env
export

defaults: bash

#
# Producer commands
#
producer-build:
	docker build \
	--tag ${PRODUCER_LABEL} \
	./docker/Producer

producer-run:
	docker run \
	--env-file ${PWD}/.env \
	--env CONSUMER_HOST=consumer \
	--env CONSUMER_PORT=9001 \
	--volume ${PWD}/docker/Producer:${WORKING_DIR} \
	--volume ${PWD}/vendor:/vendor \
	--volume ${PWD}/../../../../:${CORE_DIR} \
	--workdir ${WORKING_DIR} \
	--name ${PRODUCER_LABEL} \
	--rm \
	${PRODUCER_LABEL} ./run.sh

#
# Consumer commands
#
consumer-build:
	docker build \
	--tag ${CONSUMER_LABEL} \
	./docker/Consumer

consumer-run:
	docker run -d \
	--env-file ${PWD}/.env \
	--volume ${PWD}/docker/Consumer:${WORKING_DIR} \
	--volume ${PWD}/vendor:/vendor \
	--volume ${PWD}/../../../../:${CORE_DIR} \
	--workdir ${WORKING_DIR} \
	--name ${CONSUMER_LABEL} \
	--rm \
	 ${CONSUMER_LABEL} ./run.sh

consumer-stop:
	docker stop ${CONSUMER_LABEL}