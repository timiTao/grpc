#!/usr/bin/env bash

MY_PATH="`dirname \"$0\"`"              # relative
MY_PATH="`( cd \"$MY_PATH\" && pwd )`"  # absolutized and normalized
if [ -z "$MY_PATH" ] ; then
  # error; for some reason, the path is not accessible
  # to the script (e.g. permissions re-evaled after suid)
  exit 1  # fail
fi

#REPO_LIST=`cat repositories.json | `
for REPO in $(jq -r '.repositories | .[] | .url' repositories.json); do
    echo "RUNNING: $REPO"
    cd  "$REPO/" && $MY_PATH/local-composer.sh $1 $2 $3 $4 $5
done