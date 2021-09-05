build:
	docker run --rm --interactive --tty --volume $(PWD):/app composer install

clean:
	docker run --rm --interactive --tty --volume $(PWD):/app composer dump-autoload

test:
	docker-compose exec -w /var/www slim /var/www/vendor/bin/pest