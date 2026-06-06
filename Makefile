dev:
	docker build -f ./docker/Dockerfile -t micro:latest --target dev --progress=plain .
prod:
	docker build -f ./docker/Dockerfile -t micro:latest --target prod --progress=plain .
autoload:
	docker compose exec franken composer dump-autoload

