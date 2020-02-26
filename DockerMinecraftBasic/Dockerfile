FROM debian:latest
RUN apt-get update
RUN apt-get install -y javacc 
COPY ./forge_serveur.jar /
RUN java -jar /forge_serveur.jar
COPY ./server.properties /server.properties
COPY ./eula.txt /eula.txt 
CMD java -jar /forge_serveur.jar

