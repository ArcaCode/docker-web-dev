

# Environnement de développement avec docker

Un environnement de développement complet avec docker.

## Installation

Il faudra que docker et docker-compose soit installé sur ton système.

Récupére le dépôt sur ton ordinateur :

```bash
git clone https://github.com/ArcaCode/docker-web-dev.git
```

## Utilisation

Déplace toi dans le dossier que tu viens de cloner :

```bash
cd docker-web-dev
```

Démarre docker-compose :

```bash
docker-compose up -d
```

Crée un dossier dans le dossier app puis crée ton site à l'intérieur de celui-ci :

```bash
mkdir app/mon-site
```

Pour accéder à ton site vas sur [localhost](http://localhost/).

## Option
Si tu veux utiliser un nom de domaine en local, crée un lien dans ton fichier hosts.

### Linux

```bash
sudo vim /etc/hosts
```
Et rajoute :

```bash
127.0.0.1  nom-de-domaine.local
```
> En remplaçant "nom-de-domaine" par le nom du dossier que tu as créé.

Crée ensuite le fichier de configuration nginx:

```bash
touch .docker/nginx/nom-de-domaine.conf
```

Edite le et colle le contenu suivant à l'intérieur puis sauvegarde :

```bash
server {

   listen 80;
   server_name nom-de-domaine;
   root /var/www/nom-de-domaine;
   index index.php index.html index.htm;

   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }

   location ~* \.PHP$ {
       fastcgi_index   index.php;
       fastcgi_pass   php-fpm:9000;
       include         fastcgi_params;
       fastcgi_param   SCRIPT_FILENAME    $document_root$fastcgi_script_name;
   }

}

```
> En remplaçant "nom-de-domaine" par le nom de domaine choisi.

Relance les containers pour prendre en compte la nouvelle configuration :

```bash
docker-compose restart
```

Et voilà ton nouveau site est disponible en local !
