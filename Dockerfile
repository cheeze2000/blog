FROM ruby:latest

ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.9.0/wait /wait
RUN chmod +x /wait

WORKDIR /blog
COPY . .

ARG ADMIN_PASSWORD
ARG ADMIN_USER
ARG POSTGRES_PASSWORD
ARG POSTGRES_USER
ARG POSTGRES_DB

ENV ADMIN_PASSWORD "$ADMIN_PASSWORD"
ENV ADMIN_USER "$ADMIN_USER"
ENV POSTGRES_PASSWORD "$POSTGRES_PASSWORD"
ENV POSTGRES_USER "$POSTGRES_USER"
ENV POSTGRES_DB "$POSTGRES_DB"
ENV RAILS_ENV "production"

RUN bin/bundle install
RUN bin/rails assets:precompile

CMD /wait && bin/rails db:migrate && bin/rails s -e production
