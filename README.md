# Projet-4

Repository pour le projet 4 de la formation Développeur Web Junior d'OpenClassRooms "Créez un blog pour un écrivain".


Dans ce repository il sera possible de trouver tous les fichiers du projet, mis à jour au fur et à mesure de l'avancée. Ainsi que la base de donnée pour permettre l'utilisation dudit Projet.


Le projet est fait en Programmation Orienté Objet et suit les consignes d'une structure faite selon le modèle MVC. 


## Ses fichiers se découpent ainsi :


- Le dossier "Config" contient les informations relatives à la base de données pour permettre la connection à cette dernières et sont en .ini.
- Le dossier "Controller" contient tous les fichiers relatifs aux controlleurs du site, que ce soit pour le front ou le back-end. 
- Le dossier "DB" contient la base de données vierge avec la liste des tables à intégrer et utiliser pour faire fonctionner le site. 
- Le dossier "Manager" contient la liste des différents managers nécéssaires pour faire fonctionner le site, ainsi que la connection à la base de données sous forme d'un objet en Singleton.
- Le dossier "Model" contient les modèles nécéssaires pour le bon fonctionnement du site. Ainsi que le dispatcher permettant à l'index de correctement gèrer les redirections.
- Le dossier "View" contient les différentes vues du site, ainsi que le header et le footer de ce dernier, avec le template originel.
- Et enfin, le dossier "Web" contient toutes les extensions nécéssaires au site comme Bootstrap, Javascript et Jquery mais aussi du CSS et la librairie d'images utilisées.
- Les derniers fichiers sont l'Autoloader servant a charger automatiquement les classes sur le site, l'index servant de base au site entier et gérant avec l'aide du dispatcher les redirections et les pages à charger et afficher ainsi que le README que vous êtes actuellement en train de lire !