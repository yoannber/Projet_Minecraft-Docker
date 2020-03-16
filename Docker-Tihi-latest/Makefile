DOCKER_COMPOSE_VERSION=1.21.0

export SERVER_HOSTNAME=$(shell hostname -I | cut -f1 -d' ')


default: serve

ip: 
	@echo "-----------------------------------"
	@echo "Server Hostname: $(SERVER_HOSTNAME)"
	@echo "-----------------------------------"

serve:	ip
	# docker-compose up --scale minecraft=2 -d --build
	docker-compose up -d --build --remove-orphans

clean:
	docker-compose down

install: docker.install docker-compose.install

docker.install:
	wget -qO- https://get.docker.com/ | sh

docker-compose.install:
	sudo curl -L https://github.com/docker/compose/releases/download/$(DOCKER_COMPOSE_VERSION)/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
	sudo chmod +x /usr/local/bin/docker-compose
	docker-compose version

