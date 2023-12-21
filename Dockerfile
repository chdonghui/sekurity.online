#### Dockerfile start ####

FROM httpd:latest

RUN apt update -y && apt upgrade -y && apt install -y php mariadb-server libapache2-mod-php php-mysql

#### Dockerfile end ####
