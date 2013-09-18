#!/bin/sh
ENV="prod"
if [ $1 ]
then
    ENV="$1"
fi

git pull origin
composer update
php vendor/doctrine/doctrine-module/bin/doctrine-module.php orm:schema-tool:update --force