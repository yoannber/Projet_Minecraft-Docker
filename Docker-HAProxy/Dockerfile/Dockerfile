FROM debian:latest

RUN apt-get update
RUN apt-get install -y javacc

COPY ./server/ /

CMD java -jar -Xms3072M -Xmx3072M  /spigot.jar

