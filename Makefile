build:
	docker-compose build
up:
	docker-compose up -d
down:
	docker-compose down
exec-php:
	docker-compose exec php bash
php-test:
	docker-compose run --rm php ./vendor/phpunit/phpunit/phpunit ./tests
php-migration:
	docker-compose run --rm php php artisan migrate:fresh
exec-mysql:
	docker-compose exec db sh
