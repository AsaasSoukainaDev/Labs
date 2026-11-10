# Tutoriel : méthodes et propriétés statiques

## Objectif

Compter les instances d'articles créées pendant l'exécution du script.

## Explication pas à pas

1. `$nombreCree` est une propriété statique : elle appartient à la classe, et non à un objet particulier.
2. Le constructeur incrémente cette propriété à chaque création d'un article.
3. `nombreCree()` est une méthode statique qui lit le compteur sans nécessiter d'instance.
4. Le script crée deux articles puis appelle la méthode avec `Article::nombreCree()`.

## Exécuter

Depuis `lab-poo/pratique` :

```powershell
php .\statique\exemple.php
```

Résultat attendu :

```text
Nombre d articles crees : 2
```

## Lien avec le projet

Un membre statique représente un état ou un comportement lié à la classe. Ce compteur est pédagogique et n'est pas une stratégie de comptage pour une application réelle.

## Exercice

Ajoute une méthode statique qui remet le compteur à zéro et vérifie son effet.