# jean-forteroche
## OpenClassRooms Parcours Chef de Projet Multimedia - DÉVELOPPEMENT - Yann CLEMENT:
### Projet N°3 - Blog d'un ecrivain 

## Installation
1. Aller dans le dossier WWW
2. Copier les Sources dans le répertoire jean-forteroche/ (à créer)
3. Créer la base de données forteroche
    1. Se connecter à MySql
    2. Puis faire "Create database forteroche;"
    3. Sortir de MySql
4. Ouvrir la console et se placer dans le dossier jean-forteroche
5. Faire un Composer install
    1. Téléchargement et instalaltion des dépendances
    2. Configuration du module FileManager (gestion des images)
        1. Il n'existe pas de dépendance composer)
    3. Import automatique du DUMP SQL (Table et sources)
        1. Donne la possibilité d'un rechargement de la base.
        2. L'import automatique ne fonctionne que sur des environnements unix

## Fonctionnalitées

### FRONT:
- Visualisation des Posts (Episodes du livre)
- Ajout d'un commentaire ou d'une réponse à un commentaire
- Signaler un commentaire

### BACKOFFICE:
- Mise à jour de la page d'accueil (TinyMce)
- Ajout d'un nouveau Post (TinyMce)
    - Publication immédiate
    - Publication différée (mode brouillon)
    - Suppression d'un Post
    - Publication / Dépublication d'un Post
    
- Gestion des signalements (commentaires)
    - Validation commentaire
        - Depuis le Front (si connecté)
        - Depuis Admin Alert
    - Suppression
        - Depuis le Front (si connecté)
        - Depuis Admin Alert
    - Modération du commentaire
        - Depuis Admin Alert 
        
- Gestion des utilisateurs
    - Ajout Utilisateur
    - Suppression Utilisateur
    - Modification du Mot de Passe
    
- Gestion des images
    - Module d'importation des images intégré directement à TinyMce
    - Recadrage de l'image
    - Modfication de l'image
    
 ## Démo
 une démo est disponible à cette adresse: [Jean ForteRoche](https://yc-design.eu/jean-forteroche/ "Jean ForteRoche Homepage")
 
 Compte de test:
 Login: visiteur
 Password: visiteur
