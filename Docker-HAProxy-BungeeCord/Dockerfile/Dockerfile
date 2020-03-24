FROM debian:latest

RUN apt-get update
RUN apt-get install -y javacc
RUN apt-get install -y ssh
RUN mkdir logsmine
COPY ./server/ /

CMD java -jar -Xms3072M -Xmx3072M  /spigot.jar

