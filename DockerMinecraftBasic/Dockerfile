FROM debian:latest
RUN apt-get update
RUN apt-get install -y javacc 
COPY ./minecraft_server.1.12.2.jar /
RUN java -jar /minecraft_server.1.12.2.jar
COPY ./server.properties /server.properties
COPY ./eula.txt /eula.txt 
CMD java -jar /minecraft_server.1.12.2.jar

