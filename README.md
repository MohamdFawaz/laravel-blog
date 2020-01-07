# LaravelBlog

This project was generated with [Laravel](https://laravel.com/) version 6.9.0.
This is a backend blog system for posting and commenting on posts using 
[Angular Blog](https://github.com/MohamdFawaz/angular-blog) as a frontend and postgresql as DB engine.

## How to Setup

To get this system working you have to have the following prerequisites installed:
[PHP](https://www.php.net/),
[Redis](https://redis.io/),
[Postgresql](https://www.postgresql.org/),
[Composer](https://getcomposer.org/)

Once cloned run create a database in postgresql with related name e.g. laravel_blog,

Take a copy of .env.example into .env file and replace the following with your created database info:

`DB_CONNECTION=pgsql
 DB_HOST=127.0.0.1
 DB_PORT=5432
 DB_DATABASE=laravel_blog
 DB_USERNAME=postgres
 DB_PASSWORD=root
`

After doing so, run `php artisan migrate` to create the tables in database.

Also you'll need to install all the dependencies using `composer install` 

#### Generate JWT
To generate JWT secret inside your .env file use `php artisan jwt:secret` 
It is the key that will be used to sign your tokens. How that happens exactly will depend on the algorithm that you choose to use.
#### Seed blog and users data
To get started quickly the dummy blog posts and categories use this command `php artisan canvas:setup --data`.

Also to seed the database with testing users account run `php artisan db:seed --class=InitialUsersSeeder` 

## Starting Realtime Server
Make sure to configure the broadcast driver to use Redis in the .env file in `BROADCAST_DRIVER=redis
` 
## Running the Server

Run `php artisan serve` for a dev server. Navigate to `http://localhost:800/home`.
If everything is installed correctly you should be able to see laravel login screen

