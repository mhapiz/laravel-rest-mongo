## Instalation

Clone the repository

> git clone https://github.com/mhapiz/laravel-rest-mongo.git

Switch to the repo folder

> cd laravel-rest-mongo

Install all the dependencies using composer

> composer install

and

> npm/yarn install

Copy the example env file and make the required configuration changes in the .env file

> cp .env.example .env

Generate a new app key

> php artisan key:generate

Start the local development server

> php artisan serve

You can access the server at http://localhost:8000

## API Endpoint

| URL                                          | METHOD |                                                                                   Body |
| -------------------------------------------- | :----: | -------------------------------------------------------------------------------------: |
| {Domain}/api/login                           |  POST  |                                               'email': 'xx@xx.com', 'password': 'xxx', |
| {Domain}/api/register                        |  POST  |                                 'name': 'xx', 'email': 'xx@xx.com', 'password': 'xxx', |
| {Domain}/api/refresh                         |  POST  |                                                                                        |
| {Domain}/api/logout                          |  POST  |                                                                                        |
| {Domain}/api/vehicle/get-all                 |  GET   |                                                                                        |
| {Domain}/api/vehicle/find/{id}               |  GET   |                                                                                        |
| {Domain}/api/vehicle/store                   |  POST  |                            'tahun_kendaraan': 'xxx', 'warna: 'xxxx', 'harga': 'xxxxx', |
| {Domain}/api/vehicle/update/{id}             |  PUT   |                            'tahun_kendaraan': 'xxx', 'warna: 'xxxx', 'harga': 'xxxxx', |
| {Domain}/api/vehicle/destroy/{id}            | DELETE |                                                                                        |
| {Domain}/api/vehicle/motorcycle/get-all      |  GET   |                                                                                        |
| {Domain}/api/vehicle/motorcycle/find/{id}    |  GET   |                                                                                        |
| {Domain}/api/vehicle/motorcycle/store        |  POST  | 'mesin': 'xxx', 'tipe_suspensi': 'xxx', 'tipe_transmisi': 'xxx', 'vehicle_id': 'xzxx', |
| {Domain}/api/vehicle/motorcycle/update/{id}  |  PUT   | 'mesin': 'xxx', 'tipe_suspensi': 'xxx', 'tipe_transmisi': 'xxx', 'vehicle_id': 'xzxx', |
| {Domain}/api/vehicle/motorcycle/destroy/{id} | DELETE |                                                                                        |
| {Domain}/api/vehicle/car/get-all             |  GET   |                                                                                        |
| {Domain}/api/vehicle/car/find/{id}           |  GET   |                                                                                        |
| {Domain}/api/vehicle/car/store               |  POST  |     'mesin': 'xxx', 'kapasitas_penumpang': 'xxxx', 'tipe': 'xxx', 'vehicle_id': 'xxx', |
| {Domain}/api/vehicle/car/update/{id}         |  PUT   |     'mesin': 'xxx', 'kapasitas_penumpang': 'xxxx', 'tipe': 'xxx', 'vehicle_id': 'xxx', |
| {Domain}/api/vehicle/car/destroy/{id}        | DELETE |                                                                                        |
| {Domain}/api/sales/get-stock                 |  GET   |                                                                                        |
| {Domain}/api/sales/get-cars                  |  GET   |                                                                                        |
| {Domain}/api/sales/get-motorcycles           |  GET   |                                                                                        |
