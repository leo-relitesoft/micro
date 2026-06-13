prod: down build-prod run-prod
dev: down build-dev run-dev composer-init-dev

down:
	docker compose down

build-dev:
	docker build -f ./docker/Dockerfile -t micro:latest --target dev --progress=plain .

composer-init-dev:
	docker compose exec franken composer update

build-prod:
	docker build -f ./docker/Dockerfile -t micro:prod --target prod --progress=plain .

build-debug:
	 docker build -f ./docker/Franken-debug.Dockerfile -t franken-debug:latest --progress=plain .

builder:
	docker build -f ./docker/Dockerfile -t micro:builder --target prod-builder --progress=plain .

autoload:
	docker compose exec franken composer dump-autoload

run-prod:
	docker compose -f docker-compose-prod.yml up -d

run-dev:
	docker compose -f docker-compose.yml up -d

test:
	docker compose exec franken composer test

test-unit:
	docker compose exec franken vendor/bin/phpunit --filter=Unit

test-cover:
	docker compose exec franken vendor/bin/phpunit --filter=Unit --coverage-html var/coverage

test-func:
	docker compose exec franken vendor/bin/phpunit --filter=Functional