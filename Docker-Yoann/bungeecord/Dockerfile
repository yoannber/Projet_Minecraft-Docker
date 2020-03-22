FROM debian:latest

RUN apt-get update
RUN apt-get install -y javacc

COPY ./server/ /

CMD java -jar -Xms512M -Xmx512M  /BungeeCord.jar

