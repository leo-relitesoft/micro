dev:
	docker build -f ./docker/Dockerfile -t micro:latest --target dev --progress=plain .
prod:
	docker build -f ./docker/Dockerfile -t micro:prod --target prod --progress=plain .
builder:
	docker build -f ./docker/Dockerfile -t micro:builder --target prod-builder --progress=plain .
autoload:
	docker compose exec franken composer dump-autoload
run-prod:
	docker compose -f docker-compose-prod.yml up -d
