# Tutoriel : namespaces

## Objectif

Organiser le modèle `Article` et le `ArticleRepository` dans des espaces de noms distincts, puis importer le dépôt dans le point d'entrée.

## Lire la structure

- [`app/Models/Article.php`](app/Models/Article.php) déclare `App\Models\Article`.
- [`app/Repositories/ArticleRepository.php`](app/Repositories/ArticleRepository.php) déclare `App\Repositories\ArticleRepository` et importe le modèle avec `use App\Models\Article`.
- [`demo.php`](demo.php) charge les fichiers de l'exercice et importe le dépôt avant de l'utiliser.

Les namespaces évitent les collisions de noms et rendent le rôle des classes visible. Le projet Laravel associe déjà `App\` au dossier `app/` avec Composer. Pour cette démonstration autonome, les fichiers sont chargés explicitement au lieu de dépendre d'un autoloader Composer.

## Exécuter

Depuis le dossier `pratique` :

```powershell
php .\namespaces\demo.php
```

Résultat attendu :

```text
Decouvrir les namespaces
```

## À retenir

- Le namespace d'une classe correspond à son organisation logique, pas directement à un mécanisme d'inclusion de fichier.
- `use` importe un nom pleinement qualifié pour simplifier son utilisation.
- Dans une application Laravel, Composer charge normalement les classes via le mapping PSR-4; ici, les `require` gardent l'exercice exécutable seul.

## Pour aller plus loin

Dans `demo.php`, remplace l'identifiant `1` par `2` et observe le message « Article introuvable. ».