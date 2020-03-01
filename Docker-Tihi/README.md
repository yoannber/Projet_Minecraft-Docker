# Minecraft
Blabla
## Commands
- make
- make clean

## Read this please
Set the environment variable for the haproxy's container with the ***get_DIR.sh*** script output :  
```
./get_DIR.sh 
```
As follow : 
```
...
haproxy:
    build: ./haproxy
    container_name: ggHaproxy
    environment:
      - DIR=**<your_output>**
...
```
