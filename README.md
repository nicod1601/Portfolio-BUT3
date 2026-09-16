# Portfolio BUT Informatique

Ce projet est un portfolio personnel réalisé avec le framework PHP CodeIgniter 4. Il présente :

- le profil de l’étudiant,
- les compétences du BUT Informatique,
- les projets réalisés,
- les informations de contact.

Le site est conçu pour être moderne, immersif et inspiré d’un style “tech / cyber / portfolio”.

## Présentation du site

Le projet contient :

- une page d’accueil avec présentation du profil,
- un menu latéral avec les compétences du BUT,
- une page par compétence (`/competence/1`, `/competence/2`, `/competence/3`),
- un design avec fond animé, boutons, cards et typographie inspirée du monde numérique.

La structure principale est la suivante :

- `app/Controllers` : contrôleurs PHP
- `app/Views` : fichiers HTML / vues
- `app/Config/Routes.php` : routes du site
- `public/assets` : CSS, JS, images

## Fonctionnement

Le site fonctionne sur le principe d’une architecture MVC :

- le contrôleur reçoit la requête,
- la route décide quelle page afficher,
- la vue affiche le contenu HTML,
- le CSS et le JavaScript donnent le rendu visuel.

Par exemple :

- `/` affiche la page d’accueil
- `/competence/1` affiche la compétence 1
- `/competence/2` affiche la compétence 2
- `/competence/3` affiche la compétence 3

## Prérequis

Avant de lancer le projet, vérifie que tu as bien :

- PHP 8.2 ou plus
- Composer installé
- les extensions PHP nécessaires : `intl`, `mbstring`

## Installation

1. Ouvre un terminal dans le dossier du projet.
2. Installe les dépendances PHP :

```bash
composer install
```

3. Copie le fichier d’environnement :

```bash
cp env .env
```

4. Vérifie que le fichier `.env` est bien présent.

## Lancer le site

### Option 1 : serveur intégré PHP

```bash
php -S localhost:8080 -t public
```

Puis ouvre dans le navigateur :

```text
http://localhost:8080
```

### Option 2 : avec CodeIgniter

```bash
php spark serve
```

Par défaut, le site sera accessible sur une adresse locale de type :

```text
http://localhost:8080
```

## Points importants

- Le point d’entrée du site est dans le dossier `public/`.
- Il faut toujours accéder au site via `public`, pas directement à la racine du projet.
- Si tu modifies les routes, vérifie bien que les liens utilisent les chemins corrects, par exemple :

```html
<a href="/competence/2">C2 — Optimiser</a>
```

## Développement

Si tu veux continuer le projet :

- ajoute de nouvelles vues dans `app/Views`
- ajoute les contrôleurs nécessaires dans `app/Controllers`
- modifie les routes dans `app/Config/Routes.php`
- personnalise le design dans `public/assets/css/style.css`

## Auteur

Nicolas Delpech

## Licence

Projet réalisé dans le cadre du BUT Informatique.
