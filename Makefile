sail := vendor/bin/sail

.PHONY: setup
setup:
	cp ./.env.example ./.env
	make start
	$(sail) artisan key:generate
	$(sail) artisan jwt:secret
	make migrate
	make seed
	make stop

.PHONY: migrate
migrate:
	$(sail) artisan migrate

.PHONY: seed
seed:
	$(sail) artisan db:seed

.PHONY: start
start:
	$(sail) up

.PHONY: start-deamon
start:
	$(sail) up -d

.PHONY: stop
stop:
	$(sail) down

