POXEDEX

### Developer
* Regita Lisgiani

### Built With
* [Laravel 8](https://laravel.com/docs/8.x)
* [MySQL](https://www.mysql.com/)

### Package Use
* [JWT Firebase](https://github.com/firebase/php-jwt)

### Design Pattern
* [Service Repository Pattern](https://dev.to/safbalili/implement-crud-with-laravel-service-repository-pattern-1dkl)

### Installation

1. First Clone the project 
```sh
git clone https://github.com/regitald/pokedex
```
2. Whenever you clone a new Laravel project you must now install all of the project dependencies. This is what actually installs Laravel itself, among other necessary packages to get started.When we run composer, it checks the composer.json file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires. Because these packages are constantly changing, the source code is generally not submitted to github, but instead we let composer handle these updates. So to install all this source code we run composer with the following command.
```sh
composer install
```
3. Next you should install and build your database and migrate existing migration:
```sh
php artisan migrate
```
3. Setup the database on env
4. Run the seeder to create dump data for categories, specifications, Types and Powers
 ```sh
php artisan db:seed
```
5. Generate jwt
 ```sh
php artisan jwt:generate
```

### Roles
There are two types of roles: guest and user <br />
-guest can only view data <br />
-users can create, update and delete data categories, specifications, types, powers, monsters and mark/catch monsters <br />

### API DOCUMENTATION

Import the postman Documentation [POXEDEX](https://www.postman.com/blue-crater-6199/workspace/tentang-anak/collection/3484329-8d5dfe30-40f1-46a3-8386-443eaae310a6?ctx=documentation)

### Request Login

`GET /auth/login/`

    curl -i -H 'Accept: application/json' {{url}}/auth/login
    body json
    username: username
    

### Response

    "status": 201,
    "message": "Login Success",
    "data": {
        "login_date": {
            "date": "2022-12-10 01:46:05.984912",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbi1qd3QiLCJzdWIiOjEsImlhdCI6MTY3MDYzNjc2NSwiZXhwIjoxNjcwNzIzMTY1LCJ1c2VyIjoicmVnaXRhIn0.DWv7Rq3paKpJjC5-eeP0DuM80HTRIwscnwfzw8mErR0"
    }


### Notes
Also configure for storage upload eg: 
```sh
php artisan storage:link 
```
