# Portfolio BUT Informatique

Portfolio personnel de Nicolas Delpech réalisé avec **CodeIgniter 4**. Le site présente le profil, les compétences du BUT Informatique et plusieurs projets réalisés pendant la formation.

L’interface utilise un menu latéral, un fond animé en JavaScript, des cartes de compétences et un carrousel d’images pour les projets.

## Architecture du projet

Le projet suit l’architecture MVC de CodeIgniter :

```text
Requête HTTP
	-> app/Config/Routes.php
	-> app/Controllers/
	-> app/Views/
	-> public/assets/ (CSS, JavaScript, images)
```

Les dossiers utiles sont :

| Dossier ou fichier | Rôle |
| --- | --- |
| `app/Config/Routes.php` | Déclare les URL et les contrôleurs associés. |
| `app/Controllers/` | Reçoit les requêtes et prépare les données à afficher. |
| `app/Views/` | Contient le HTML/PHP de chaque page. |
| `app/Views/layout/` | Contient l’en-tête commun et le pied de page. |
| `public/assets/css/` | Feuilles de style du site. |
| `public/assets/js/` | Animations du fond et carrousel des projets. |
| `public/assets/images/` | Photo de profil et images des projets. |
| `public/index.php` | Point d’entrée public de l’application. |

## Pages et routes

Les routes sont définies dans `app/Config/Routes.php` :

| URL | Contrôleur | Vue principale | Contenu |
| --- | --- | --- | --- |
| `/` | `Home::index()` | `accueil.php` | Profil, compétences, projets et contact. |
| `/competence/c1` | `Competence::competence(1)` | `competence.php` | Compétence C1 : réaliser un développement. |
| `/competence/c2` | `Competence::competence(2)` | `competence.php` | Compétence C2 : optimiser une application. |
| `/competence/c3` | `Competence::competence(3)` | `competence.php` | Compétence C3 : collaborer en équipe. |
| `/projet` | `Projet::index()` | `projet.php` | Liste des projets, technologies et images. |

Les chemins corrects utilisent donc `c1`, `c2` et `c3`, et non `/competence/1`, `/competence/2` ou `/competence/3`.

## Fonctionnement des contrôleurs

### `Home`

La méthode `index()` affiche la page d’accueil en assemblant les trois vues communes et principales :

```php
return view('layout/header') . view('accueil') . view('layout/footer');
```

La vue `accueil.php` contient les liens vers les compétences, la page des projets et les informations de contact.

### `Competence`

La méthode `competence(int $id)` reçoit l’identifiant de la compétence depuis la route. Elle sélectionne les données correspondantes dans un tableau PHP : code, titre, description, ressources et situation personnelle.

Ces données sont transmises à la vue commune `competence.php` avec la variable `$data`. La vue utilise ensuite des boucles PHP pour afficher les unités d’enseignement associées.

Exemple de circulation d’une requête :

```text
/competence/c2
	-> Competence::competence(2)
	-> sélection des données de C2
	-> competence.php avec $data
```

### `Projet`

La méthode `index()` prépare un tableau contenant les projets, leur description, leurs technologies et leurs images. Elle transmet ce tableau à `projet.php`.

La vue parcourt les projets avec `foreach`. Chaque projet possède un carrousel d’images. Le fichier `public/assets/js/projet.js` permet de passer à l’image précédente ou suivante et de sélectionner une image avec les points de navigation.

### `BaseController`

`BaseController` est le contrôleur parent de `Home`, `Competence` et `Projet`. Il fournit le point commun prévu par CodeIgniter pour initialiser les services, helpers ou modèles partagés.

## Vues et assets

- `app/Views/layout/header.php` : structure HTML commune, titre, feuille CSS, menu latéral et canvas du fond animé.
- `app/Views/layout/footer.php` : pied de page commun.
- `app/Views/accueil.php` : contenu de la page d’accueil et chargement de `style.js`.
- `app/Views/competence.php` : affiche une compétence reçue dans `$data`.
- `app/Views/projet.php` : affiche les projets reçus dans `$data`.
- `public/assets/css/style.css` : couleurs, mise en page, responsive design et composants visuels.
- `public/assets/js/style.js` : étoiles, paillettes et animation du fond.
- `public/assets/js/projet.js` : fonctionnement des carrousels de projets.

Les vues échappent les données dynamiques avec `esc()` avant de les afficher. Cela limite les risques d’injection HTML lorsque le contenu évolue.

## Installation

### Prérequis

- PHP `8.2` ou supérieur
- extensions PHP `intl` et `mbstring`
- Composer, pour installer les dépendances du projet

Depuis le dossier du projet :

```bash
composer install
cp env .env
```

Le fichier `.env` peut ensuite être adapté si une configuration particulière est nécessaire. Le portfolio n’utilise pas de base de données pour ses données actuellement affichées : elles sont directement définies dans les contrôleurs.

## Lancer le serveur

La commande recommandée avec CodeIgniter est :

```bash
php spark serve
```

Le site est alors disponible à l’adresse suivante :

```text
http://localhost:8080
```

Alternative avec le serveur PHP intégré :

```bash
php -S localhost:8080 -t public
```

Le dossier `public/` est le point d’entrée web. Il ne faut pas exposer directement la racine du projet.

## Modifier le site

- Pour ajouter ou modifier une URL : `app/Config/Routes.php`.
- Pour modifier les données d’une compétence : `app/Controllers/Competence.php`.
- Pour modifier les données d’un projet : `app/Controllers/Projet.php`.
- Pour modifier la structure HTML : `app/Views/`.
- Pour modifier l’apparence : `public/assets/css/style.css`.
- Pour modifier les animations ou interactions : `public/assets/js/`.

## Auteur

Nicolas Delpech — BUT Informatique
