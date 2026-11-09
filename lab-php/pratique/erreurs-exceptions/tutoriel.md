# Tutoriel : erreurs et exceptions

## Objectif

Refuser un article dont le titre est vide et afficher un message compréhensible sans interrompre toute la démonstration.

## Lire l'exemple

Dans [`exemple.php`](exemple.php), la fonction `publierArticle()` nettoie le titre avec `trim()`. Si le titre est vide, elle lance une `InvalidArgumentException` avec `throw`. L'appelant encadre l'opération avec `try` et intercepte précisément cette exception avec `catch`.

La fonction détecte la donnée invalide; le point d'entrée décide comment présenter le refus. Cette séparation évite de mélanger la règle métier et son affichage.

## Exécuter

Depuis le dossier `pratique` :

```powershell
php .\erreurs-exceptions\exemple.php
```

Résultat attendu :

```text
Article publie : Les exceptions en PHP
Publication refusee : Le titre ne peut pas être vide.
```

## À retenir

- Une exception signale qu'une opération ne peut pas suivre son chemin normal.
- Le `catch` doit se trouver à un endroit capable de décider quoi faire de l'erreur.
- Ici, les titres sont des données de démonstration en mémoire; aucune publication Laravel n'est réalisée.

## Pour aller plus loin

Modifie les titres testés pour inclure un titre valide avec des espaces au début et à la fin, puis vérifie que `trim()` les retire.