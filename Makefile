sail := vendor/bin/sail

.PHONY: start
start:
	$(sail) up -d

.PHONY: stop
stop:
	$(sail) down

.PHONY: copy-env
copy-env:
	cp ./.env.example ./.env

.PHONY: generate
generate:
	$(sail) artisan key:generate
	$(sail) artisan jwt:secret

.PHONY: migrate
migrate:
	$(sail) artisan migrate

.PHONY: seed
seed:
	$(sail) artisan db:seed

