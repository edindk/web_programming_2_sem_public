#!/bin/sh
#To run the file execute <bash heroku.sh>

cd ./frontend
cp .env-heroku .env
npm run build
cd ../api
cp .env-heroku .env
cd ./config
cp database-heroku.php database.php
#git add .
#git push frontend-heroku +HEAD:main
#git push api-heroku +HEAD:main
# heroku run php artisan storage:link --remote api-heroku
#heroku run php artisan migrate:fresh --seed --remote api-heroku