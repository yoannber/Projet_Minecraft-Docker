# Minecraft
Ajout de nouvelles variables d'environnement dans le fichier .env
## Commands
- make
- make clean

## Ce qui a été modifié
- Makefile : le docker compose est lancé différement
- Docker-compose : 
    - pour pouvoir mettre deux noms différents aux dockers minecraft => création de deux services minecraft différents
    - network commun
    - variables de nom + ip
- html/rcon : fichiers index et conf pour pouvoir administrer le docker (concerne seulement le docker minecraft_1)
- Haproxy : fichier de configuration avec un nouveau front/back pour dockercraft

## A voir
- voir à créer potentiellement un autre dossier rcon pour pouvoir administrer le second serveur (param minecraft_2)
- voir à variabiliser peut-être plus de ports dans le fichier de conf haproxy
- voir a réduire le temps de check du haproxy car la bascule me paraît assez longue ? (juste un test effectué avec un docker stop)
