# Minecraft
Ajout de nouvelles variables d'environnement dans le fichier .env + map & Dockercraft fonctionnels (via le HAProxy)

## Commandes pour Build et Destroy
- make
- make clean

## Ce qui a été modifié
- Makefile : le docker compose est lancé différement
- Docker-compose : 
    - Pour pouvoir mettre deux noms différents aux dockers minecraft : création de deux services minecraft différents (toujours d'actualité)
    - Network commun
    - Variables de nom + IP (j'ai enlevé les ports car c'est pas très lisible et c'est pas forcément utile)
- html/rcon : fichiers index et conf pour pouvoir administrer le docker (concerne seulement le conteneur "Minecraft_2" car c'est lui qui est toujours sélectionné par défaut par l'algo de l'HAProxy)
- Haproxy : fichier de configuration avec un nouveau front/back pour dockercraft et pour le map (via une ACL dans le front du jeu principal)
- Dockercraft : ajout du front sur le service HAProxy dans le docker-compose (écoute sur le 36544)

## À voir
- Voir à créer potentiellement un autre dossier rcon pour pouvoir administrer le second serveur (param minecraft_2)
- Voir à réduire le temps de check du haproxy car la bascule me paraît assez longue ? (juste un test effectué avec un docker stop) : effectivement, c'est assez long...
