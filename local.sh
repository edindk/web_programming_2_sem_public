#!/bin/sh
#To run the file execute <bash local.sh>

cd ./frontend
cp .env-local .env
cd ../api
cp .env-docker .env
cd ./config
cp database-docker.php database.php