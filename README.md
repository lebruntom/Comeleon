<div id="top"></div>

<!-- PROJECT LOGO -->
<br />
<div align="center">
    <img src="https://t3.ftcdn.net/jpg/01/37/37/10/240_F_137371088_fgyexgp5eh97Ds4BVgVxZULaFgbLBIjh.jpg" alt="Logo" width="120">

  <h3 align="center">Projet Comeleon</h3>

  <p align="center">
    <a href="https://github.com/lebruntom/Comeleon/issues">Signaler un Bug</a>
    ·
    <a href="https://github.com/lebruntom/Comeleon/issues">Demander une nouvelle fonctionnalitée</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Sommaire</summary>
  <ol>
    <li>
      <a href="#Presentation">Présentation</a>
      <ul>
        <li><a href="#Contexte">Contexte</a></li>
        <li><a href="#Projet">Projet</a></li>
	<li><a href="#Technologie">Technologies Utilisées</a></li>
      </ul>
    </li>
    <li>
      <a href="#Installation">Installation</a>
      <ul>
        <li><a href="#Prerequis">Les Prérequis</a></li>
        <li><a href="#Importation">Importation du projet</a></li>
        <li><a href="#Configuration">Configuration</a></li>
        <li><a href="#Importation">Importer la base de données</a></li>
      </ul>
    </li>
    <li><a href="#Utilisation">Utilisation</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#Images">Les Images</a></li>
  </ol>
</details>



<!-- Contexte -->
## Contexte



L’agence Comeleon propose ses services dans la création de site, application, à l’acquisition de nouveaux clients via les moteurs de recherche et les réseaux sociaux, elle accélère le business sur internet.

Dans ce projet, nous travaillons dans cette société dans le service ‘création de site’, notre équipe est constitué de 3 membres.

<p align="right">(<a href="#top">Retour en haut</a>)</p>



### Projet

Mr. X, désire augmenter sa visibilité sur internet pour booster son business. Cela devient impossible pour un entrepreneur de ne pas avoir de site en ligne.
Il désire avoir un site moderne avec un style qui correspond à son activité.

Il désire un site, accessible et ergonomique pour présenter son activité, que les clients puissent laisser des avis(dtb), consulter ses différentes prestations (dtb) et avoir un formulaire de contact. 

Notre équipe a été chargée de réaliser ce projet pour un Blombier Chauffagiste.

<p align="right">(<a href="#top">Retour en haut</a>)</p>


### Technologie

Lors de la réalisation de ce projet, nous avons utilisés différentes technologies :

* [Symfony 5](https://symfony.com/)
* [BootStrap 5](https://getbootstrap.com/)
* [PHP 7](https://www.php.net/)
* [Twig](https://twig.symfony.com/)

<p align="right">(<a href="#top">Retour en haut</a>)</p>


<!-- Installation -->
## Installation

Afin de pouvoir visualiser et utiliser notre projet, il est néccessaire de procéder à quelques actions :

### Les Prérequis

Dans un premier temps, nous aurons besoin de Symfony 5 

* Télécharger Symfony sur [symfony.com](https://symfony.com/download)


Ensuite, nous aurons besoin d'une version de PHP 7 au minimum

* Télécharger PHP 7 sur [php.net](https://www.php.net/downloads)
* Vous pouvez verifier l'installation en entrant la commande 
```sh
  php -v 
  ```


Nous aurons besoin du manager de dépendance Composer

* Télécharger composer sur [getcomposer.org](https://getcomposer.org/download/)

Pour finir, nous aurons besoin d'un serveur de base de données (ici wampserver)
* Télécharger WampServer sur [wampserver.com](https://www.wampserver.com/)


### Importation

1. Cloner le repository
   ```sh
   https://github.com/lebruntom/Comeleon.git
   ```

<p align="right">(<a href="#top">Retour en haut</a>)</p>


### Configuration

Penssez à bien lancer WampServer lors de la configuration de la base !

Modifiez les informations de connexion à la base de données dans '.env'

![Fichier de config](Images/config_bdd.png)

### Importation

Pour créer la base de données veillez entrer :

```sh
   symfony console doctrine:database:create
```

Une fois la base créée, nous allons importer les tables

```sh
   symfony console doctrine:migrations:migrate
```

Pour en finir avec la base de données, nous allons importer les jeux d'essais réalisés

```sh
   symfony console doctrinefixture:load
```


<!-- Utilisation -->
## Utilisation

Le projet est constitué de différentes pages :

* une page d'accueil 
* une page de présentation
* une page contenant les différentes prestations proposées
* une page avec tous les avis postés
* une page de contact


Vous pouvez créer un compte et ensuite vous connecter sur le site avec les memes identifiants

Par défaut, toutes personnes connectés ont la possibilité d'effectuer des modification sur le site web.

<p align="right">(<a href="#top">Retour en haut</a>)</p>


<!-- CONTACT -->
## Contact

Romain Ramanzin - [@tom-lebrun](https://www.linkedin.com/in/tom-lebrun/) - tomlebrun27@gmail.com

Lien du projet : [https://github.com/lebruntom/Comeleon](https://github.com/lebruntom/Comeleon)

<p align="right">(<a href="#top">Retour en haut</a>)</p>

## Images

Voici la liste des différentes images utilisées sur notre site :

* [Logo du site](https://t3.ftcdn.net/jpg/01/37/37/10/240_F_137371088_fgyexgp5eh97Ds4BVgVxZULaFgbLBIjh.jpg)
* [image d'accueil](https://image.freepik.com/vecteurs-libre/composition-isometrique-pour-fixation-fuites-chaudiere_1284-17770.jpg)
* [accueil](https://www.raquin-duchon.com/wp-content/uploads/photo-plombier.jpg)
* [accueil_2](https://storage.googleapis.com/assets-monsite-medias/monsitemoncommerce.com-la-plomberie-longonienne/2020/11/3a47bf1a-istock-5170613592.jpg)




