build:
	docker-compose build
up:
	docker-compose up -d
down:
	docker-compose down
exec-php:
	docker-compose exec php bash
exec-mysql:
	docker-compose exec db sh
