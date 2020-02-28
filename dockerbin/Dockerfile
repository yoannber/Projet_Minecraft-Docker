FROM debian:latest


RUN apt-get update
RUN apt-get install -y javacc


COPY ./serveur/ /



CMD java -jar /forge_serveur.jar

