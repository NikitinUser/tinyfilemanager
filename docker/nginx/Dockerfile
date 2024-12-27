FROM nginx:latest AS base

RUN apt-get update && apt-get install -y curl

WORKDIR /var/www/html

ARG UID
ENV UID $UID

RUN addgroup --gid $UID --system app && adduser --uid $UID --system --disabled-login --disabled-password --gid $UID app

ARG CONFIG=default.conf
ENV CONFIG $CONFIG

COPY docker/nginx/$CONFIG /etc/nginx/conf.d/default.conf
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf

FROM base AS deploy

COPY --chown=$UID:$UID public ./public
