# Exercices pratiques : architecture PHP

Les quatre scripts illustrent les notions du lab avec des exemples d'articles fictifs. Ils sont exécutables seuls et n'utilisent ni Laravel ni base de données. Les données du DAO sont conservées en mémoire pour la démonstration.

Le projet de référence déclare PHP `^8.3` et Laravel `^13.17`. Les exercices nécessitent uniquement PHP CLI.

## Démarrage rapide

Depuis ce dossier :

```powershell
php -v
php .\hello-world.php
```

Sortie attendue : `Hello, architecture PHP !`

## Exécuter les exemples

Depuis ce dossier :

```powershell
php .\architecture-3-tiers\exemple.php
php .\dao\exemple.php
php .\service\exemple.php
php .\base-service\exemple.php
```

Chaque sous-dossier contient un `tutoriel.md` avec les étapes, la sortie attendue et un exercice complémentaire.