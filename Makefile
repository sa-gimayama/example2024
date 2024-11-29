.PHONY: up
up:
	./vendor/bin/sail up -d
.PHONY: down
down:
	./vendor/bin/sail down
.PHONY: build
build:
	./vendor/bin/sail build
.PHONY: install
install:
	./vendor/bin/sail composer install && ./vendor/bin/sail bun install
.PHONY: migrate
migrate:
	./vendor/bin/sail artisan migrate
.PHONY: seed
seed:
	./vendor/bin/sail artisan db:seed
.PHONY: dev
dev:
	./vendor/bin/sail bun dev
