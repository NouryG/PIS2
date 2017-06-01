---
title: Guide d'installation de la TEST-APP.
---

> Toutes les informations nécessaires pour le bon fonctionnement de notre **application**.

- [Initialisation](#Initialisation)
    - [Installation de l'environnement](#installation-de-lenvironnement)
    - [Intégration de la BDD](#intégration-de-la-bdd)
    - [Informations utiles](#informations-utiles)

---

## Initialisation

Dans ce guide nous allons voir comment installer notre application WEB et ainsi l'utiliser.


### Installation de l'environnement

Il suffira de placer les fichiers sources fournis avec l'application dans votre serveur personnel. Il faut savoir que notre application tourne sous la version PHP 7.0.15 (au minimum) et la version MySQL 5.6.35.

### Intégration de la BDD

Après avoir mis en place votre environnement, lancez PHPmyADMIN. Nous allons l'utiliser pour créer notre base de données.

Sur l'onglet de gauche, cliquez sur "Nouvelle base de données" que vous nommerez "ACTEMEDIA".

![new](http://imgur.com/C4cv1uM.jpg)

Après avoir séléctionné la base créee, importez la base de données. Cette dernière se trouve dans le dossier db des fichiers sources (src/db/actemedia.sql).

Cliquez sur import puis séléctionner le fichier et importez le.

![import](http://imgur.com/oLpoH2W.jpg)

Voici normalement le résultat que vous devriez avoir.

![resultat](http://imgur.com/6vVpWf1.jpg)

### Informations utiles 

Un mot de passe est requis lors de la connexion initiale à l'application WEB. Ce mot de passe peut être modifié en suivant ces étapes : 
 - Modifier le 'password' dans connexion.php.
 - Modifier les appels de la sessions dans tous les fichiers php des différentes pages du site (condition du if en début de chaque fichier php).
