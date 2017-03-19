---
title: Guide d'installation de la TEST-APP.
---

> Toutes les informations nécessaires pour le bon fonctionnement de notre **application**.

- [Initialisation](#Initialisation)
    - [Installation de MAMP](#installation-de-MAMP)
    - [Intégration de la BDD](#integration-de-la-bdd)
    - [Intégration des fichiers .php](#integration-des-fichiers-.php)
    - [Informations utiles](#informations-utiles)

---

## Initialisation

Dans ce guide nous allons voir comment installer MAMP et l'utiliser. Cet outil nous permettra principalement de mettre en place un serveur en local dans lequel MySQL et PHP sont préconfigurés.


### Installation de MAMP

[Télécharger la dernière version de MAMP selon votre OS.](https://www.mamp.info/en/downloads/) Installez le logiciel et lancez le.


### Intégration de la BDD

Après avoir lancé MAMP, cliquez sur "Démarrer les serveurs". Vous devriez donc avoir accès à votre localhost via votre navigateur web préféré. 

Au lancement de votre localhost, vous verrez la page d'accueil de MAMP. Une barre d'outil est disponible.

Cliquez sur l'onglet "outils" puis choisissez PHPmyADMIN.

![mamp_login](http://i.imgur.com/SfTzdH1.jpg)

Sur l'onglet de gauche, cliquez sur "Nouvelle base de données" que vous nommerez "ACTEMEDIA".

![new](http://imgur.com/C4cv1uM.jpg)

Après avoir séléctionné cette dérnière, nous allons y importer les tables que j'ai crée.

Cliquez sur import puis séléctionner le fichier téléchargé et importez le.

![import](http://imgur.com/oLpoH2W.jpg)

Voici normalement le résultat que vous devriez avoir.

![resultat](http://imgur.com/zSRigcK.jpg)

### Intégration des fichiers .php

Maintenant nous allons dire à MAMP où chercher ses fichiers .php. 

Ouvrez les réglages de MAMP puis allez dans "WebServer". Cliquez sur l'icone document puis séléctionner le dossier SRC du projet.

### Informations utiles 

Ces réglages peuvent être chiant à réaliser mais tant que nous n'avons pas de serveur donné par l'entreprise nous serons obligés de travaillé comme cela.

Pensez à bien sauvegarder vos base de données de temps en temps (export sur phpmyadmin).
