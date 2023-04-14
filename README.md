## Laravel App

Simple Laravel app. This app was implemented based on the tutorial from [Traversy Media](https://www.youtube.com/@TraversyMedia)

Tutorial reference: https://www.youtube.com/watch?v=MYyJ4PuL4pY

## What can you learn
 - Setting up laravel with sail
 - Simple Job listing app
   - Login
   - Registration
   - Listings
   - Basic Authentication and Authorisation
 - Migrations and seeding
 - Running the app with sail
 - Simple make file to simply the running process
 - Eloquent: Query Scopes
 - Clockwork extension
 - Tinker

## Setting up and Running

Make sure you have sail installed: https://laravel.com/docs/9.x/sail or Run `composer install` if you already have composer installed.

git clone [git@github.com:manjufy/laravel-app.git](https://github.com/manjufy/laravel-app.git)
    

    cd laravel-app>
    $ laravel-app > mv .env.example .env

    // Option 1
    $ laravel-app > sail up // to start
    $ laravel-app > docker compose exec laravel.test php artisan migrate:refresh --seed // to create migration and seed data
    $ laravel-app >sail down // to stop

    // Option 2
    $ laravel-app > make start // to start
    $ laravel-app > make migrate // to migrate and seed the data
    $ laravel-app > make stop // to stop


    Navigate to http://localhost
    Login with username:manju@manju.dev, password:password

## Commands

Once you have sail up and running use some of the following useful commands for debugging

    docker ps -a // to see the list of running containers
    docker compose exec {service} {command} // Execute a command in a running container
        Ex: docker compose exec laravel.test ls

    // TO Create a migration
    docker compose exec laravel.test php artisan make:migration create_listings_table

    // To run a migration
    docker compose exec laravel.test php artisan migrate

    // To seed the DB with some users
    docker compose exec laravel.test php artisan db:seed

    // To Migrate and seed
    docker compose exec laravel.test php artisan migrate --seed

    // To create model
    docker compose exec laravel.test php artisan make:model Listing

    // To create factory seeder
    docker compose exec laravel.test php artisan make:factory ListingFactory --model=Listing

    // To refresh and migrate 
    docker compose exec laravel.test php artisan migrate:refresh --seed

    // Images inside storage/app/public are not publicly accessible, to do so
    docker compose exec laravel.test php artisan storage:link

## Reference

    Mysql Cheatsheet: https://gist.github.com/bradtraversy/c831baaad44343cc945e76c2e30927b3

    https://www.youtube.com/watch?v=MYyJ4PuL4pY
