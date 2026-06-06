build-dev:
	docker build -f ./docker/Dockerfile -t micro:latest --target dev --progress=plain .