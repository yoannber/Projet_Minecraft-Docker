# Projet Minecraft
**Deux versions sont disponibles :**
- Une avec uniquement HAProxy
- L'autre avec HAProxy + BungeeCord

## Pourquoi ?
La version HAProxy embarque la fonctionnalité qui permet au jeu de fonctionner en haut dispo. Cependant, HAProxy n'est pas fait pour permettre une haute dispo native du jeu Minecraft (déconnexion des joueurs si le serveur principal venait à planter).

BungeeCord permet de remédier à ce manque car il permet de rediriger les joueurs automatiquement vers un second serveur.

## Détails
**Voici ce que l'on peut retrouver dans les deux versions :**
- *Minecraft* (version 1.15.2)
- *Rcon* : webconsole qui permet d'administrer les serveurs Minecraft, on peut également y retrouver certaines infos (nom serveurs, nombre des joueurs, version du jeu, etc.) - ce webconsole a été complétement développé from scratch (en s'inspirant des travaux d'autres webconsoles Rcon)
- *Dynmap* : interface web qui permet d'afficher l'emplacement des joueurs se trouvant dans un serveur
- *Dockercraft* : un ajout qui permet d'administrer les conteneurs Docker dans un monde Minecraft (il faut une version Minecraft inférieure à la 1.12.2) - attention à ne pas donner l'accès à ce serveur à n'importe qui car le serveur possède les accès root sur la machine hôte
- *Backup* : permet de backupé les data (sauvegardes de la map et des progressions) vers un bucket S3 sur AWS - à savoir qu'il mettre certaines informations sensibles dans le fichier ".env" (attention donc à ne pas partager ce fichier après avoir renseigné ces infos)
