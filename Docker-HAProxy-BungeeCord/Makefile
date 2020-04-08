DOCKER_COMPOSE_VERSION=1.25.4

export SERVER_HOSTNAME=$(shell hostname -I | cut -f1 -d' ')


default: serve

ip:
	@echo "-----------------------------------"
	@echo "Server Hostname: $(SERVER_HOSTNAME)"
	@echo "-----------------------------------"

serve:	ip
	docker-compose up -d --build

clean:
	docker-compose down

restore:
	./restore.sh

install: docker.install docker-compose.install aws-cli

docker.install:
	wget -qO- https://get.docker.com/ | sh

docker-compose.install:
	sudo curl -L https://github.com/docker/compose/releases/download/$(DOCKER_COMPOSE_VERSION)/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
	sudo chmod +x /usr/local/bin/docker-compose
	docker-compose version

aws-cli:
	curl "https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip" -o "awscliv2.zip"
	unzip awscliv2.zip
	sudo ./aws/install
	rm -rf ./aws awscliv2.zip
	aws --version
