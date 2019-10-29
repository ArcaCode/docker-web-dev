

# Environnement de développement avec docker

Un environnement de dev complet avec docker.

## Installation

Il vous faudra docker et docker-compose installer sur votre systeme.

Récupérez le dépôt sur votre ordinateur :

```bash
git clone https://github.com/ArcaCode/docker-web-dev.git
```

## Utilisation

Déplacez vous dans le dossier que vous venez de cloner :

```bash
cd docker-web-dev
```

Démarrer docker-compose :

```bash
docker-compose up -d
```

Créer un dossier dans le dossier app puis créer votre site a l’intérieur de celui-ci :

```bash
mkdir app/mon-site
```

Pour accéder a votre site rendez-vous sur [localhost](http://localhost/).

## Option
Si vous voulez utiliser un nom de domaine en local, créer un lien dans votre fichier hosts.

### Linux

```bash
sudo vim /etc/hosts
```
Et rajouter :

```bash
127.0.0.1  nom-de-domaine.local
```
> En remplaçant "nom-de-domaine" par le nom du dossier que vous avez créer.

Créer ensuite le fichier de configuration nginx:

```bash
touch .docker/nginx/nom-de-domaine.conf
```

Editer le et coller le contenu suivant a l’intérieur puis sauvegarder :

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
> En remplaçant "nom-de-domaine" par le nom de domaine choisie que vous avez créer.

Relancer les containers pour prendre en compte la nouvelle config :

```bash
docker-compose restart
```

Et voila votre nouveau site est disponible en local !
