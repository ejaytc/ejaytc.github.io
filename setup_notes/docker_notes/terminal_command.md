# Terminal Commands
- Mostly for Docker container manipulation for Odoo and Postgresql
## Tails Logs
docker logs -f [container]

## Restoring Database Using Docker
### Create Database
```
docker exec -i odoodocker_db_1 createdb <DB_NAME> -O odoo -U odoo
```

```
docker exec -it [db_container] odoo -d  dev00 -u [odoo_module] --workers 0 --stop-after-init
```
### Restore Database from dump
```
SQL File
cat [backup_file] | docker exec -i [db_container] psql -U odoo -d <DB_NAME>
```
	OR
```
Zip File
gunzip [dump_file] -c | docker exec -i odoodocker_db_1 psql -U odoo -d [dp_name]
```
### Update Admin Password

```
docker exec -i odoo-docker_db_13 psql -U odoo -d <DB_NAME>
update res_users set password = 1 where id = 1;

update ir_config_parameter set value = '2022-04-01 13:20:50' where key = 'database.expiration_date';
DROP TABLE [DB_name];
```

### Delete Model Name
```
docker exec -i odoodocker13_db_1 psql -U odoo -d db_name.sql
delete from ir_model where model = [model_name];
```

### Backup database
```
optional
mkdir backups

## For version 8

docker exec odoodocker8_db_1 pg_dump -U odoo db_name > backups/db.sql
docker exec -i odoodocker_db_1 pg_dump -U odoo -E UTF-8 db_name > db.202004151031.sql
```


```
sudo docker exec -t <db_docker_container> pg_dump --no-owner -u odoo <db_name> | gzip > <zip_name>.zip
```

### Update Module in Docker 
```
command: ./entrypoint.sh -d <DB_NAME> -u <MODULE_NAME>
```

### Scaffold
```
v8
docker exec -it --user root odoo8_web_1 odoo.py scaffold modulename /mnt/extra-addons

OR
docker exec -it --user root cibi_web_1 bash /usr/bin/odoo scaffold [new_module_name] /mnt/extra-addons

OR 
docker exec -it --user root odoodocker13_web_1 /usr/bin/odoo scaffold [new_module_name] /mnt/erp

ctrl + D
chmod 755  the_path_to_target
sudo chmod 775 -R projectname/   
sudo chown username -R projectname/
```

### Help
```
docker --help
docker exec --help
```

### Checking Logs
```
docker logs odoodocker8_web_1

docker logs odoodocker8_web_1 | grep <search text>

docker logs -f <CONTAINER>

docker-compose logs -f
docker-compose logs

docker-compose restart web && docker-compose logs -f --tail=10 web

```
### Removing of volume specific container
```
docker rm odoodocker13_db_1
docker volume rm odoodocker13_odoo-db-data

```

### Links
```
https://linuxize.com/post/how-to-remove-docker-images-containers-volumes-and-networks/

https://github.com/camptocamp/docker-odoo-project
```

### Get Update
```
docker-compose pull`
```

```
https://hub.docker.com/r/tecnativa/odoo-base
```

```
$ docker exec -it odoo /bin/bash

-- odoo path inside docker
/usr/lib/python2.7/dist-packages/openerp/`
`/usr/lib/python2.7/dist-packages/openerp/addons

docker cp odoo8_web_1:/usr/lib/python2.7/dist-packages/openerp/addons/. ./
docker cp odoo8_web_1:/usr/lib/python2.7/dist-packages/openerp/addons/base_import ~/odoo/odoo-docker-8/module_folder/
```

### Build Dockerfile
```
docker-compose up --build
```

```
Drop database
sudo docker exec -it --user postgres odoo-docker_db_1 bash
psql -U odoo -d postgres
```

```
https://github.com/stefanprodan/dockprom
```

### Sample configuration
```
version: '2'
services:
  web:
    image: odoo:14.0
    depends_on:
      - db
    # command: odoo -d database -u all
    restart: unless-stopped
    ports:
      - "8014:8069"
    volumes:
      - odoo-web-data:/var/lib/odoo
      - ./config:/etc/odoo
      - ./addons:/mnt/extra-addons
  db:
    image: postgres:10
    restart: unless-stopped
    ports:
      - "5414:5432"
    environment:
      - POSTGRES_DB=postgres
      - POSTGRES_PASSWORD=odoo
      - POSTGRES_USER=odoo
      - PGDATA=/var/lib/postgresql/data/pgdata
    volumes:
      - odoo-db-data:/var/lib/postgresql/data/pgdata
volumes:
  odoo-web-data:
  odoo-db-data:
```
### How to copy
```
docker cp <containerId>:/file/path/within/container /host/path/target
```

### Run Docker commands without sudo


1. Add the docker group if it doesn't already exist

```
$ sudo groupadd docker
```

2. Add the connected user $USER to the docker group

Optionally change the username to match your preferred user.

```
$ sudo gpasswd -a $USER docker
```
IMPORTANT: Log out and log back in so that your group membership is re-evaluated.


3. Restart the docker daemon

```
$ sudo service docker restart
```

### TAIL
docker-compose log -f --tail=10 web

### Recursive reset
git submodule foreach --recursive git reset --hard


### Access bash of docker
```
docker exec -it <web_container> /bin/bash
```

### Scaffold within the bash
```
usr/bin/odoo scaffold sample_file /mnt/extra-addons
```

### Copy Within the Container 
```
docker cp odoo13-web-1:"mnt/extra-addons/uhh_default_access" "PATH"
```


### Direct Command Docker

```
docker exec -it docker_odoo-web-1 /bin/bash -c "usr/bin/odoo scaffold odoo_access_matrix /mnt/extra-addons"
```


### Run without Docker
./odoo.py -c /etc/odoo-server.conf -d database -u module_folder

### Run root
docker exec -it --user='root' web_container /bin/bash



isntalling pypdf2 module

```
apt-get install python-pypdf2
```


### Backup db from docker

```
docker exec -t <docker_container> pg_dump --no-owner -U odoo db_name | gzip > <file_name.zip>
```

```
docker exec -t <docker_container> 
```

```
docker exec -i <docker_container> pg_dump -U odoo -E UTF-8 uhh > <file_name.sql>
```

### Copy file from server

```
scp -i <publickey> <user>@<hostname>:<directory and file> <local directory>
```


### Backup db from postgres


```
docker exec -it [db_container] /bin/bash
```

```
su postgres
```

```
pg_dump zoup | gzip > db_name.zip
```



sudo chmod +r etc/odoo/odoo.conf





PSQL DOCKERIZED COMMAND
docker exec -itu root <container> bash
psql -U <user> -d <database>