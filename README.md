## Installation

- Clone the repository `https://github.com/mchaelphen/Backend-Inosoft-Test.git`
- Pull the latest update of the app
- Run the command `Composer Install` to install / update the packages dependency
- Make new `.env` with `.env.example`
- Make sure you have connected the mongodb using atlas and compass
- run `php artisan serve` to start the API

## Notes

This app use:
- Laravel 9, PHP 8, MongoDB 6

I've prepared a Postman Collection for all the routes available.
Import the collection into Postman App for easier review of the app.

The app implement Service Repository Pattern
Strict class type are on and configured within App/Providers/AppServiceProvider
Request and Response are standardize with REST API Status

JWT authentication is required for POST request: creating vehicle and transaction.
you can authenticate by accessing the register and login route by providing username and password
POST `localhost:8000/api/register`
POST `localhost:8000/api/login`

Product Routes
GET `localhost:8000/api/vehicle`
GET `localhost:8000/api/vehicle/{id}`
GET `localhost:8000/api/stock?numOfTires=n` (n = 2 for motorcycle, 4 for car, else both of those with stock)
POST `localhost:8000/api/vehicle` (Require JWT)

GET `localhost:8000/api/transaction`
POST `localhost:8000/api/transaction` (Require JWT)