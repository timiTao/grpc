#!/usr/bin/env bash

app=${PWD}
appVendor=$app/vendor
if [ ! -f $app/composer.json ]; then
    echo "$app/composer.json don't exist"
    exit 128
fi

MY_PATH="`dirname \"$0\"`"              # relative
MY_PATH="`( cd \"$MY_PATH\" && pwd )`"  # absolutized and normalized
if [ -z "$MY_PATH" ] ; then
  # error; for some reason, the path is not accessible
  # to the script (e.g. permissions re-evaled after suid)
  exit 1  # fail
fi

DIR_NAME=${PWD##*/} # current dir name

length=${#DIR_NAME}
last_char=${DIR_NAME:length-1:1}
[[ $last_char == "/" ]] && DIR_NAME=${DIR_NAME:0:length-1}; :

dockerComposerFileDir=$MY_PATH/configs/$DIR_NAME
dockerComposerFile=$dockerComposerFileDir/docker-composer.json
if [ ! -f $dockerComposerFile ]; then
    mkdir -p $dockerComposerFileDir
    template=`cat $MY_PATH/template-composer.json`
    fileContent=${template/REPLACE_REPO/$MY_PATH}
    fileContent=${fileContent/REPLACE/$app}
    echo "$fileContent" > "$dockerComposerFile"
fi

COMPOSER=$dockerComposerFile \
COMPOSER_VENDOR_DIR=$appVendor \
composer $1 $2 $3 $4 $5