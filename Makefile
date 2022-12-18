sail := vendor/bin/sail

.PHONY: setup
setup:
	$(sail) composer i
	cp ./.env.example ./.env
	$(sail) artisan key:generate
	$(sail) artisan jwt:secret

.PHONY: migrate
migrate:
	$(sail) artisan migrate --seed

.PHONY: start
start:
	$(sail) up -d

.PHONY: stop
stop:
	$(sail) down

