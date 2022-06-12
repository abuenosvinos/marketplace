FROM node:14

RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y git make curl tar

RUN yarn global add @vue/cli -g

WORKDIR /var/www/frontend

CMD ["tail", "-f", "/dev/null"]
