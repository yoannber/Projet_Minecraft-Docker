# Minecraft : version avec HAProxy et BungeeCord
**Voici le schéma correspondant :**
<p align="center"> <img src="images/HAProxy-BungeeCord.png" alt="" title="" width="654" height="511" /> </p>

## Commandes
- make (pour build)
- make clean (pour destroy)
- make install (pour installer Docker, docker-compose et awscli)
- make restore (pour restaurer le dernier backup en date)

## Répertoire "data"
- Il faut recréer l'aborescence si elle n'existe pas :

  ![](images/Data_tree.png)
  
## Fichier ".env"
- Il faut recréer le fichier ".env" qui embarque les addresses IP des conteneurs Docker et les infos du S3 s'il n'existe pas. Par exemple :
```
PROJECT_NAME=DockerProject
NETWORK_SUBNET=192.168.2.0/24
MINECRAFT_1_IP=192.168.2.10
MINECRAFT_2_IP=192.168.2.20
HAPROXY_IP=192.168.2.30
BUNGEECORD_IP=192.168.2.40
RCON_IP=192.168.2.50
DOCKERCRAFT_IP=192.168.2.60
AWS_ACCESS_KEY_ID=SOME8AWS3ACCESS9KEY 
AWS_SECRET_ACCESS_KEY=sUp3rS3cr3tK3y0fgr34ts3cr3cy
S3_BUCKET_URL=s3://bucket-fml/
AWS_DEFAULT_REGION=eu-west-3 
CRON_SCHEDULE=0 * * * *
BACKUP_NAME=Backup_worlds
```
