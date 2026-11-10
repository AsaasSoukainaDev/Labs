# Tutoriel : encapsulation

## Objectif

Protéger le titre d'un article et contrôler les changements apportés à cette donnée.

## Explication pas à pas

1. La propriété `$titre` est privée : le code extérieur ne peut pas la modifier directement.
2. Le constructeur appelle `renommer()` afin d'appliquer la même règle à la création et aux modifications.
3. `renommer()` retire les espaces superflus et refuse un titre vide avec une exception.
4. `titre()` fournit un accès contrôlé à la valeur.
5. Le script affiche le titre initial, le modifie, puis affiche la nouvelle valeur.

## Exécuter

Depuis `lab-poo/pratique` :

```powershell
php .\encapsulation\exemple.php
```

Résultat attendu :

```text
Titre protege
Nouveau titre
```

## Lien avec le projet

La validation centralisée protège l'état d'un objet métier. Le script est autonome et ne modifie pas l'application Laravel.

## Exercice

Essaie de renommer l'article avec une chaîne vide et observe l'exception non interceptée.