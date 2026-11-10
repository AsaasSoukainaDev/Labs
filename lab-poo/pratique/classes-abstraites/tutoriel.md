# Tutoriel : classes abstraites

## Objectif

Définir un modèle commun pour les contenus et obliger chaque type concret à fournir sa description.

## Explication pas à pas

1. `Contenu` est abstraite : elle sert de base et ne peut pas être instanciée directement.
2. Son constructeur conserve le titre dans une propriété protégée, accessible à la classe dérivée.
3. La méthode abstraite `decrire()` impose une méthode aux classes qui héritent de `Contenu`.
4. `Article` étend `Contenu` et définit sa propre description.
5. Le script crée un article et affiche le résultat de `decrire()`.

## Exécuter

Depuis `lab-poo/pratique` :

```powershell
php .\classes-abstraites\exemple.php
```

Résultat attendu :

```text
Article : Les classes abstraites
```

## Lien avec le projet

L'exemple utilise un contenu de type article pour illustrer un modèle commun. Il est autonome et n'est pas intégré au projet Laravel.

## Exercice

Crée une classe `Actualite` qui hérite de `Contenu` et fournit sa propre méthode `decrire()`.