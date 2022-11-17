sail := vendor/bin/sail

.PHONY: stop
stop:
	$(sail) down -v

.PHONY: start
start:
	$(sail) up # run all services

.PHONY: migrate
migrate:
	docker compose exec laravel.test php artisan migrate:refresh --seed
