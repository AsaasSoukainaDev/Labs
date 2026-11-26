# SRP — Responsabilité unique

## Objectif

Comparer une classe qui valide, stocke et formate du JSON à une version où ces tâches sont réparties entre des objets dédiés.

## Fichiers concernés

- Lanceur : [`exemple.php`](exemple.php)
- Fonctionnalité simulée : ajouter et lister des disciplines, sans base de données.

## Parcours de l'exemple

1. Le namespace `Solid\Srp` et les classes du principe sont déclarés directement dans `exemple.php`; le fichier peut être lancé seul.
2. La partie **AVANT** construit `DisciplineToutEnUn`. `ajouter()` vérifie le libellé, ajoute une ligne à son tableau interne et encode un message JSON. `lister()` encode la collection. Le même objet change donc si la règle métier, le stockage ou le format JSON change.
3. La partie **APRÈS** construit séparément `DisciplineValidator`, `DisciplineRepository` et `DisciplineJsonPresenter`, puis les injecte dans `DisciplineService`.
4. `ajouter('Cardio', ...)` passe la validation, est stocké en mémoire et la réponse de succès est encodée par le presenter.
5. `ajouter('ab', ...)` déclenche `InvalidArgumentException`. Le service la traduit en réponse JSON d'erreur; aucune ligne invalide n'est enregistrée.
6. `lister()` lit le dépôt et délègue le formatage JSON au presenter.

## Exécuter

Depuis `lab-solid/pratique` :

```powershell
php .\SRP\exemple.php
```

La sortie contient les réponses JSON des versions avant/après, puis la liste avec `Cardio` uniquement.

## Lien avec le projet et limite

Le scénario reprend les champs et la validation de la gestion des disciplines. Le dépôt est simulé en mémoire; ce script ne lance pas l'API ni PDO.

## Mini-exercice

Ajoutez une exportation CSV sans placer la logique CSV dans `DisciplineValidator` ou `DisciplineRepository`. Identifiez la responsabilité qui devrait la porter.
