# Portfolio BUT Informatique

Portfolio personnel de Nicolas Delpech réalisé avec CodeIgniter 4.

Ce projet présente le parcours étudiant, les compétences du BUT Informatique, les projets réalisés pendant la formation ainsi que les informations de contact. Il s’agit d’un portfolio personnel conçu pour mettre en valeur les compétences acquises dans le cadre du diplôme.

## Présentation

Le site propose une interface moderne avec :

- un menu latéral clair et accessible,
- un fond visuel animé en JavaScript,
- des cartes de compétences inspirées du référentiel BUT,
- une page dédiée aux projets avec carrousels d’images,
- un design responsive compatible avec plusieurs tailles d’écran.

## Stack technique

- PHP 8.2+
- CodeIgniter 4
- HTML5
- CSS3
- JavaScript

## Architecture du projet

Le projet suit l’architecture MVC de CodeIgniter :

```text
app/
├── Config/
├── Controllers/
├── Views/
├── Models/
└── Libraries/

public/
├── assets/
├── index.php
└── ...
```

Les éléments importants sont :

- app/Config/Routes.php : gestion des routes et accès aux pages
- app/Controllers/ : contrôleurs principaux du site
- app/Views/ : vues HTML/PHP
- app/Views/layout/ : header et footer communs
- public/assets/css/ : styles du site
- public/assets/js/ : animations et interactions
- public/assets/images/ : visuels du portfolio

## Routes principales

Le site est organisé autour de plusieurs pages :

- / : page d’accueil
- /competence/c1 : compétence C1 — Réaliser
- /competence/c2 : compétence C2 — Optimiser
- /competence/c3 : compétence C3 — Collaborer
- /projet : page listant les projets réalisés

## Fonctionnement du projet

### Page d’accueil

La page d’accueil est gérée par le contrôleur Home et affiche le profil, les compétences et le bouton d’accès aux projets.

### Compétences

Le contrôleur Competence reçoit l’identifiant de la compétence via l’URL, puis affiche les données associées dans la vue competence.php.

### Projets

Le contrôleur Projet prépare la liste des projets, including leur description, technologies, et images. Chaque projet est affiché avec un carrousel d’images.

## Installation

### Prérequis

- PHP 8.2 ou supérieur
- extensions PHP intl et mbstring
- Composer

### Étapes

1. Cloner le projet.
2. Ouvrir le dossier du projet.
3. Installer les dépendances :

```bash
composer install
```

4. Configurer l’environnement :

```bash
cp env .env
```

5. Vérifier et modifier le fichier .env si nécessaire.

## Démarrage du projet

Pour lancer le serveur local CodeIgniter :

```bash
php spark serve
```

Le site est accessible ensuite à :

```text
http://localhost:8080
```

Alternative avec le serveur PHP intégré :

```bash
php -S localhost:8080 -t public
```

## Personnalisation

- Modifier les routes dans app/Config/Routes.php
- Modifier le contenu des compétences dans app/Controllers/Competence.php
- Modifier les projets dans app/Controllers/Projet.php
- Modifier les vues dans app/Views/
- Modifier le style dans public/assets/css/style.css
- Modifier les animations dans public/assets/js/

## Vérification locale

Le projet a été vérifié localement avec la commande suivante :

```bash
php spark serve
```

Le serveur a bien démarré et la page d’accueil est accessible sur http://localhost:8080.

## Auteur

Nicolas Delpech — BUT Informatique
