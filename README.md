## Laravel App

Simple Laravel app

## Setting up and Running

    Make sure you have sail installed: https://laravel.com/docs/9.x/sail

    git clone git@github.com:manjufy/laravel-app.git
    cd laravel-app>
    $ laravel-app>sail up

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

## Learnings

- Eloquent: Query Scopes


## Reference

    Mysql Cheatsheet: https://gist.github.com/bradtraversy/c831baaad44343cc945e76c2e30927b3

    https://www.youtube.com/watch?v=MYyJ4PuL4pY
