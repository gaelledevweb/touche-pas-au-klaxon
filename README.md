Touche Pas Au Klaxon
Bienvenue sur Touche Pas Au Klaxon, une application de covoiturage conçue pour simplifier la mise en relation entre conducteurs et passagers.

1 - Description du projet
Cette application permet aux utilisateurs de :

Consulter les trajets disponibles.

Créer leurs propres trajets.

Modifier ou supprimer leurs trajets (si ils en sont les auteurs).

Accéder à une interface d'administration pour gérer les utilisateurs, les agences et les trajets.

Ce projet a été développé en PHP selon l'architecture MVC (Modèle-Vue-Contrôleur).

2 - Installation et prérequis

Un serveur local (ex: XAMPP, WAMP, MAMP) avec PHP 7.4+ et MySQL.

Git installé sur votre machine.

Étapes d'installation
Cloner le dépôt :

git clone https://github.com/gaelledevweb/touche-pas-au-klaxon

Configuration de la base de données :

Lancez votre serveur MySQL (via XAMPP par exemple).

Créez une base de données nommée touche_pas_au_klaxon.

Importez le fichier SQL fourni dans le dossier /sql (seed.sql).

Configuration du projet :

Vérifiez que le fichier config/database.php contient les bonnes informations de connexion à votre base de données locale.

Lancement :

Placez le dossier dans votre répertoire htdocs (pour XAMPP).

Accédez à l'application via votre navigateur : http://localhost/touche-pas-au-klaxon/public/index.php?page=home.

3 - Identifiants de connexion
Compte Administrateur (Accès au Dashboard Admin) et compte utilisateur classique : Disponible dans le dossier pdf.

4 - Structure technique
Architecture : MVC (Modèle-Vue-Contrôleur).

Langage : PHP.

Base de données : MySQL.

Style : Bootstrap.

4 - Documents complémentaires
MCD : Disponible dans le dossier pdf.

MLD :

user(id, email, password, role)

agencies(id, nom)

trips(id, agence_depart_id, agence_arrivee_id, date_heure_depart, date_heure_arrivee, places_totales, places_disponibles, auteur_id)

Projet réalisé dans le cadre d'un exercice de développement PHP.