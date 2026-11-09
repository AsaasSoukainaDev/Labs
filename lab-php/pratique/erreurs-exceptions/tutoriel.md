# Tutoriel : erreurs et exceptions

## Objectif

Refuser un article dont le titre est vide et afficher un message compréhensible sans interrompre toute la démonstration.

## Explication pas à pas

Ouvre [`exemple.php`](exemple.php) et suis les blocs dans l'ordre :

1. `declare(strict_types=1)` active le typage strict pour les appels de fonctions dans ce fichier. La fonction reçoit donc un titre déclaré comme chaîne (`string $titre`).
2. `publierArticle()` applique `trim()` au titre. Par exemple, une valeur composée d'espaces devient une chaîne vide.
3. Le `if ($titre === '')` détecte cette entrée invalide. `throw new InvalidArgumentException(...)` interrompt alors l'exécution normale de la fonction et transmet une exception à l'appelant.
4. Si le titre n'est pas vide, `sprintf()` construit le message de confirmation qui est renvoyé par `return`.
5. La boucle `foreach` essaie deux valeurs : un titre valide, puis une chaîne d'espaces. Le bloc `try` appelle la fonction et affiche son résultat quand elle réussit.
6. Pour la deuxième valeur, la fonction lance l'exception. L'exécution saute alors à `catch`, qui affiche le message de refus. Le programme continue ensuite normalement.

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

La première ligne vient du `return` de `publierArticle()`. La seconde vient du `catch`, car le titre composé d'espaces est devenu vide après `trim()`.

## À retenir

- Une exception signale qu'une opération ne peut pas suivre son chemin normal.
- Le `catch` doit se trouver à un endroit capable de décider quoi faire de l'erreur.
- Ici, les titres sont des données de démonstration en mémoire; aucune publication Laravel n'est réalisée.

## Pour aller plus loin

Modifie les titres testés pour inclure un titre valide avec des espaces au début et à la fin, puis vérifie que `trim()` les retire.