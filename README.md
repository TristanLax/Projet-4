# Projet-4

Repository pour le projet 4 de la formation Développeur Web Junior d'OpenClassRooms "Créez un blog pour un écrivain".


Dans ce repository il sera possible de trouver tous les fichiers du projet, mis à jour au fur et à mesure de l'avancée. Ainsi que la base de donnée contenant les tables nécéssaires au bon fonctionnement du site. Les détails à propos des différents dossiers se trouvent un peu plus bas.


## Les demandes et exigences du projet :

La demande de ce projet est de créer un blog pour l'écrivain "Jean Forteroche" à l'occasion de l'écriture de son livre "billet Simple pour l'Alaska". Il souhaite pouvoir innover et publier ses épisodes sous forme de billets organisés en chapitres lisibles sur internet sans devoir utiliser Wordpress. Cela implique donc un site unique et fait à la main.

- Le blog doit posséder une interface Frontend et une interface Backend, le tout fonctionnant selon le système CRUD (Create, Read, Update, Delete) permettant donc de lire les billets dans sa partie Frontend, et de les gèrer en partie Backend.
- Les billets doivent permettre l'ajout de commentaires dans leur partie Frontend avec une option de signalement, et possèder une partie Backend permettant de gèrer les commentaires ainsi que de pouvoir les modèrer, tout en faisant remonter en priorité les commentaires signalés.
- La partie Backend qu'est l'interface d'Administration doit être protégée par mot de passe pour éviter les intrusions et les possibles désagréments que pourraient apporter un système d'administration ouvert à tous.
- La rédaction de nouveaux billets se fera a l'aide de TinyMCE afin d'offrir a l'écrivain une interface WYSIWYG permettant de lui éviter de devoir tout écrire en HTML.
- Le tout doit être développé sans framework et doit correspondre aux normes de l'architecture MVC. De plus, le maximum d'éléments doivent être conçus en Programmation Orienté Objet.


## Structure et liste des dossiers du projet :


- Le dossier "Config" contient les informations relatives à la base de données pour permettre la connection à cette dernières et sont en .ini.
- Le dossier "Controller" contient tous les fichiers relatifs aux controlleurs du site, que ce soit pour le front ou le back-end. 
- Le dossier "DB" contient la base de données vierge avec la liste des tables à intégrer et utiliser pour faire fonctionner le site. 
- Le dossier "Manager" contient la liste des différents managers nécéssaires pour faire fonctionner le site, ainsi que la connection à la base de données sous forme d'un objet en Singleton.
- Le dossier "Model" contient les modèles nécéssaires pour le bon fonctionnement du site. Ainsi que le dispatcher permettant à l'index de correctement gèrer les redirections.
- Le dossier "View" contient les différentes vues du site, ainsi que le header et le footer de ce dernier, avec le template originel.
- Et enfin, le dossier "Web" contient toutes les extensions nécéssaires au site comme Bootstrap, Javascript et Jquery mais aussi du CSS et la librairie d'images utilisées.
- Les derniers fichiers sont l'Autoloader servant a charger automatiquement les classes sur le site, l'index servant de base au site entier et gérant avec l'aide du dispatcher les redirections et les pages à charger et afficher ainsi que le README que vous êtes actuellement en train de lire !


## Installer le projet :

- Cloner ou télécharger tous les fichiers du projet présents ci-dessus.
- Charger sur une nouvelle base de données ou une base de données déjà existante l'un des deux fichiers présents dans le dossier "DB" selon l'utilisation souhaitée et expliquée ci-dessous :
- Dans le dossier "DB" sont donc présents deux fichiers : un fichier "projet-clean" contenant simplement les tables vierges utilisées pour ce projet si vous souhaitez les remplir vous même avec vos propres données, et un fichier "projet" contenant les tables déjà pré-remplies avec des données vous permettant d'effectuer des tests rapidement ou de pouvoir avoir un aperçu du site fonctionnel.
- Ajouter dans le fichier dev.ini présent dans le dossier "Config" les identifiants requis pour se connecter à votre base de données(host, name, user et pass).