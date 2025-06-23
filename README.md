### Setup

Clone the repository

Create `.env` file from `.env.example` file
> cp .env.example .env

Change the values of the `.env` file to the ones you want

Go to the Laravel project dir
> cd `application`

Create `.env` file from `.env.example` file
> cp .env.example .env

Change the values of the `.env.` file for the Laravel project to match the `.env` file in the root of the project.

##### Run the project
> docker compose up --build --detach

----
##### If you are developing locally then

Run migrations
> php artisan migrate

Run the app
> php artisan serve

----
##### If you are running via docker

SSH into the app container
> docker compose exec name-application bash

Run migrations
> php artisan migrate

Run the app
> php artisan serve
