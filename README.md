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


##### example json to response api

```
{
    "payment_type_id" : 1,
    "name" : "Luan costa dos santos",
    "card_number" : "4848000088887777",
    "valid_date" : "12/2036",
    "cvv" : "484",    
    "installment" : "12",
    "id_product" : 2
}
```

##### endpoint 
```
post http://127.0.0.1:8000/api/v1/orders
```

