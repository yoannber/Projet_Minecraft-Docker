FROM debian:latest

RUN apt-get update
RUN apt-get -y install apache2
RUN apt-get -y install php7.3

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf 
RUN rm /var/www/html/index.html

COPY ./html/ /var/www/html/

CMD ["apachectl", "-DFOREGROUND"]
