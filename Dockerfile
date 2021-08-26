FROM php:8.0-fpm

# Preparation for apt
RUN set -ex
RUN apt-get update

# Tools installation
RUN apt-get install -y \
	sqlite3 \
	curl \
	nano \
	git \
	zip

WORKDIR /app

COPY ./composer.json ./composer.json
COPY ./composer.phar ./composer.phar

RUN php composer.phar update
RUN php composer.phar install
