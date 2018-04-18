# Booksports

## Installation

### Pré-requis
* Git : https://git-scm.com/downloads

* Un système de gestion de base de données (MySQL par exemple)

* Composer : https://getcomposer.org/download/

* Les pré-requis de Laravel : https://laravel.com/docs/5.6/installation#server-requirements

### Installation du projet

* Ouvrir un terminal.

* Créer une base de données dans votre SGBD
    ```
    create database nom_de_la_base;
    ```

* Aller dans le répertoire où vous voulez installer votre projet.

* Exécuter : 
    ```
    git clone https://github.com/Theo-Drappier/booksports.git
    ```

* Se déplacer dans le dossier du projet.

* Pour installer les dépendances, exécuter :
    ```
    composer install
    ```
    
* Copier le fichier « .env.example », le renommer en « .env » et l’éditer :

// Screenshot fichier

* Enregistrer les modifications.

* Génération d’une « application key » :
```
php artisan key:generate
```
* Génération de la base de données ainsi que les données :
```
php artisan migrate --seed
```

* Lancer le serveur Laravel :
```
php artisan serve
```

* Rendez-vous sur votre navigateur internet à l'adresse ```localhost:8000```

#### Enjoy !
