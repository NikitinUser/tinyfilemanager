SHELL=/bin/bash
UID := 1000

get-env:
	cp .env.example .env

up:
	env UID=${UID} docker compose up -d --build --remove-orphans
