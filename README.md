# Stuliday

Le public ciblé concerne les jeunes dynamiques qui voyagent et qui
souhaitent rencontrer de nouvelles personnes en leur proposant de
partager leurs locations avec des inconnus et/ou des amis.
Les locations devront être peu chères et tous les utilisateurs devront
avoir le droit de réserver une annonce, mais aussi d’en poster.
Les locations devront être disponibles dans le monde entier et
donc l’interface devra être intégralement en anglais.
La charte graphique est au choix et des logos de base sont fournis
mais pourront être modifiés.

## STRUCTURE DU PROJET

Structure de la base de données :

    - users : 
        - username (varchar, 255, unique)
        - email (varchar, 255, unique)
        - password (varchar, crypted, no-char-limit)
        - role (id of role)
        - _city (varchar, 255)_
    
    - biens :
        - adresse (varchar, 255)
        - description (text)
        - price (int, 10)
        - author (id of user)
        - category (id of category)
    
    - categories :
        - name (varchar, 255, unique)
    
    - role :
        - name (varchar, 255, unique)


    ( maybe later, city table exported from villes_de_france_sql )

Structure du back-end :

    - Create :
        - users : inscription
        - biens : création d'annonce de bien via interface accessible aux users
        - categories : création de categories via interface accessible aux admins
    
    - Read :
        - users : connexion, et liste users via interface accessible aux admins
        - biens : liste products via interface accessible aux visiteurs
        - categories : reliées aux products, tri par categories via recherche

    - Update :
        - users : modification city via interface accessible à l'user et l'admin
        - biens : modification annonce bien via interface accessible à l'author et l'admin
        - categories : modification categories via interface accessible aux admins
    
    - Delete :
        - users : désinscription
        - biens : suppression de products via interface accessible à l'author et l'admin
        - categories : suppression de categories via interface accessible aux admins