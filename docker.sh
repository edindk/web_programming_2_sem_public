#!/bin/sh
#To run the file execute <bash docker.sh>

cd ./frontend
cp .env-docker .env
npm run build
cd ../api
cp .env-docker .env
cd ./config
cp database-docker.php database.php
docker-compose up -d
docker exec web_programming_2_sem_api_1 php artisan migrate:fresh --seed
# docker exec web_programming_2_sem_api_1 php artisan storage:link
