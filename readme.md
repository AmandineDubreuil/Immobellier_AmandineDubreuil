Skip to content
Search or jump to…
Pull requests
Issues
Codespaces
Marketplace
Explore
 
@AmandineDubreuil 
cefomk
/
challenge_immo
Public
Fork your own copy of cefomk/challenge_immo
Code
Issues
Pull requests
Actions
Projects
Security
Insights
challenge_immo/readme.md
@cefomk
cefomk Update readme.md
Latest commit 2911f8d 1 hour ago
 History
 2 contributors
@cefomk@formeka
97 lines (70 sloc)  3.09 KB

# Agence IMMOBELLIER

Notre prestataire du jour est une agence immobilière nommé `IMMOBELLIER`.

Cet agence souhaiterait avoir un site web pour lister,ajouter,modifier ses annonces immobilières.

## Cahier des charges

- Un formulaire de connexion : 
    - un simple utilisateur peut `ajouter` une annonce 
    - un admin peut `ajouter,modifier,supprimer` une annonce

- Un formulaire pour enregistrer un utilisateur :
    - on donne la possibilité de choisir `admin ou user` comme `role` pour un utilisateur

- La page d’accueil du site web devra lister tous les biens immobiliers.

- L'affichage d'un bien immobilier devra être ainsi dans l'ordre :
    - Titre de l'annonce , préciser le type de bien immobilier (location/vente)
    - Image du bien immobilier
    - Description 
    - Surface , nombre de pièces
    - Prix

- Présence de 2 boutons `Se connecter` et `Créer un compte`

- Lorsque un utilisateur se connecte un bouton `Ajouter une annonce` apparaît ainsi qu'un bouton `Se Déconnecter`

- Lorsque un admin se connecte un bouton `Admin` 

- La base de donnée se nommera `immobellier` 

- Une table `user` devra avoir les champs suivants :
    - id_user
    - first_name
    - last_name
    - email
    - password
    - adress
    - town
    - postal_code
    - phone
    - role

- Une table `annonce` devra avoir les champs suivants :
    - id_annonce
    - title
    - description
    - image
    - type
    - price
    - surface
    - room
    - user_id
    - created_at
    - modified_at

- Détail du formulaire pour ajouter une `annonce` :
    - le champ `type` devra avoir deux choix `vente` ou `location`
    - le champ `price` est libre
    - le champ `surface` correspond à la `superficie` du bien immobilier , il est libre
    - le champ `room` correspond aux `nombres de pièces` du bien immobilier , c'est une liste déroulante avec les choix suivants `1,2,3,4,5` pièces
    - avoir la possibilité d'uploader une image du bien immobilier

## GIT

- Créer un dépôt sur un service tel que `github` ou autre pour y héberger votre travail
- Faire des commits atomiques
- Partage votre dépôt en privée avec une invitation

## Data

Exporter votre MCD (Modèle Conceptuel des Données) c'est à dire votre `schema` de base de donnée avec l'option pour créer la base de donnée en sql , que vous mettrez dans un dossier `data`.

Dans le même dossier `data` , mettez des captures d’écrans de votre projet afin que je puisse vérifier votre travail.

## Code 

Vous êtes libre de votre propre architecture de dossier, soyez cohérent ,pensez toujours à quelqu'un qui reprend ou lit votre code.

Bien indenter son code , ne pas hésiter à ajouter des commentaires , aérer votre code pour qu'il soit agréable à lire pour vous et les autres.

Personnaliser votre code afin qu'il soit unique.

Ne laissez `AUCUN` code,nom de variable,fonctions, d'un projet précédent.

Aucune feuille de style externe du type `bootstrap,picocss` ne devra être utilisés, faire votre propre feuille de style. 

## Barème de notation

```
- Git /2
- Base de donnée /3
- Frontend HTML/CSS /4
- Backend PHP /10
- Clean Code /1
```
Footer
© 2023 GitHub, Inc.
Footer navigation
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
challenge_immo/readme.md at main · cefomk/challenge_immo 