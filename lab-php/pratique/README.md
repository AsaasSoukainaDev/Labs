# Exercices pratiques PHP

Chaque notion possède son propre sous-dossier avec un exemple exécutable (`exemple.php`, ou `demo.php` pour les namespaces) et son tutoriel (`tutoriel.md`). La gestion d'articles sert de fil conducteur. Les exemples sont autonomes : le projet Laravel présent dans l'espace de travail ne contient pas encore de modèle `Article`.

Le projet Laravel déclare PHP `^8.3` et associe le namespace `App\\` au dossier `app/` dans Composer. L'exemple sur les namespaces reprend cette convention. Aucun framework ni base de données n'est requis pour exécuter les exercices.

## Exécution

Depuis ce dossier, avec PHP 8.3 ou une version compatible avec le projet :

```powershell
php .\erreurs-exceptions\exemple.php
php .\namespaces\demo.php
php .\traits\exemple.php
```

## Parcours

- [Erreurs et exceptions](erreurs-exceptions/tutoriel.md) : valider un titre et traiter une `InvalidArgumentException` au point d'entrée.
- [Namespaces](namespaces/tutoriel.md) : séparer le modèle et le dépôt en reprenant l'autoload `App\\`.
- [Traits](traits/tutoriel.md) : partager le comportement d'horodatage entre un article et un commentaire.

Les objets et données sont simulés en mémoire. Ce sont des démonstrations pédagogiques, pas des fonctionnalités déjà intégrées à l'application Laravel.