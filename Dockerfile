FROM ruby:latest

ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.9.0/wait /wait
RUN chmod +x /wait

WORKDIR /blog
COPY . .

ENV RAILS_ENV "production"

RUN bin/bundle install
RUN bin/rails assets:precompile

CMD /wait && bin/rails db:migrate && bin/rails s -e production
