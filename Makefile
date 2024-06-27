# Prepare for production

args = `arg="$(filter-out $@,$(MAKECMDGOALS))" && echo $${arg:-${1}}`

up:
	@docker compose up -d

down:
	@docker compose down

stop:
	@docker compose stop

restart:
	@docker compose restart

composer:
	@docker exec -it ofic_php composer $(call args, install)

dump:
	@docker exec -it ofic_php php artisan optimize:clear
	@docker exec -it ofic_php composer dump-autoload

static:
	@docker exec -it ofic_node npm install
	@docker exec -it ofic_node npm run dev

key:
	@docker exec -it ofic_php php artisan key:generate

migrate:
	@docker exec -it ofic_php php artisan migrate:fresh --seed

refresh:
	@docker exec -it ofic_php php artisan migrate:refresh --seed

tinker:
	@docker exec -it ofic_php php artisan tinker

art:
	@docker compose run --rm ofic_php php artisan $(call args, tin)

sh:
	@docker compose run --rm  ofic_php $(call args, bash)

production: ensure-composer ensure-permissions enable-cache build-assets

ensure-composer:
	composer update --ignore-platform-req=php --optimize-autoloader

ensure-permissions:
	chmod -R o+w storage

enable-cache:
	php artisan optimize


