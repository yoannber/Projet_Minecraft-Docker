# Projet Minecraft
**Deux versions sont disponibles :**
- Une avec uniquement HAProxy
- L'autre avec HAProxy + BungeeCord

## Prérequis
- Linux
- Makefile
- Docker
- Docker-compose
- AWS-CLI
- Git
- Client Minecraft (version 1.15.2 pour le jeu et inférieure à 1.12.2 pour Dockercraft) si on désire jouer

## Pourquoi deux versions ?
La version HAProxy embarque la fonctionnalité qui permet au jeu de fonctionner en haute dispo. Cependant, HAProxy n'est pas fait pour permettre une haute dispo native du jeu Minecraft (déconnexion des joueurs si le serveur principal venait à planter et un délai trop long pour basculer vers le second serveur Minecraft et revenir vers le serveur principal).

BungeeCord permet de remédier à ce manque car il permet de rediriger les joueurs automatiquement vers un second serveur.

## Détails
**Voici ce que l'on peut retrouver dans les deux versions :**
- *Minecraft* : le jeu à la version 1.15.2
- *Rcon* : webconsole qui permet d'administrer les serveurs Minecraft, on peut également y retrouver certaines infos (nom des serveurs, nombre des joueurs, version du jeu, etc.) - cette webconsole a été complétement développée from scratch (en s'inspirant des travaux d'autres webconsoles Rcon)
- *Dynmap* : interface web qui permet d'afficher l'emplacement des joueurs se trouvant dans un serveur
- *Dockercraft* : un ajout qui permet d'administrer les conteneurs Docker dans un monde Minecraft (il faut une version Minecraft inférieure à la 1.12.2) - attention à ne pas donner l'accès à ce serveur à n'importe qui car le serveur possède les accès root sur la machine hôte
- *Backup* : permet de backuper les data (sauvegardes de la map et des progressions) vers un bucket S3 sur AWS - à savoir qu'il faut mettre certaines informations sensibles dans le fichier ".env" (attention donc à ne pas partager ce fichier après avoir renseigné ces infos)
