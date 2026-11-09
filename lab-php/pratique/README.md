# Exercices pratiques PHP

Ces exemples couvrent les trois notions du lab : gestion des erreurs et des exceptions, namespaces et traits. Ils prennent la gestion d'articles comme fil conducteur, mais restent autonomes : le projet Laravel présent dans l'espace de travail ne contient pas encore de modèle `Article`.

Le projet Laravel déclare PHP `^8.3` et associe le namespace `App\\` au dossier `app/` dans Composer. L'exemple sur les namespaces reprend cette convention. Aucun framework ni base de données n'est requis pour exécuter les exercices.

## Exécution

Depuis ce dossier, avec PHP 8.3 ou une version compatible avec le projet :

```powershell
php .\01-erreurs-exceptions.php
php .\namespaces\demo.php
php .\03-traits.php
```

## Contenu

- `01-erreurs-exceptions.php` : valide un titre et traite une `InvalidArgumentException` au point d'entrée.
- `namespaces/` : sépare le modèle et le dépôt, puis les relie avec le namespace `App\\`.
- `03-traits.php` : partage le comportement d'horodatage entre un article et un commentaire.

Les objets et données sont simulés en mémoire. Ce sont des démonstrations pédagogiques, pas des fonctionnalités déjà intégrées à l'application Laravel.