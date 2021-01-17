# VM - BACKEND [![Build Status](https://travis-ci.com/gorapiotr/wm-backend.svg?branch=main)](https://travis-ci.com/gorapiotr/wm-backend)

## Installation
1. Download docker for project from [Link for docker .zip](https://github.com/gorapiotr/vs/tree/master/docker/docker.zip)
2. Unpack zip and run command `docker-compose up`
3. Copy project source code to `/src` directory
3. Go to container sheel `docker exec -it vm_php bash`
4. Run `composer install` 
5. Copy env file `cp .env.docker .env`
6. Generate key `php artisan key:generate`
7. Run `php artisan migrate:fresh --seed`

## Architecture

Project architecture based on [nWidart/laravel-modules](`https://github.com/nWidart/laravel-modules`).

* [Book module](`https://github.com/gorapiotr/vm-backend/tree/main/Modules/Book`)
* [Category module](`https://github.com/gorapiotr/vm-backend/tree/main/Modules/Category`)

### Docker database config
````
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=test
````

## .env for docker

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:gUdR4td8id6EE6DhXYnO7IGFOfI1PHDxiyeKaAl9Ook=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=test

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
