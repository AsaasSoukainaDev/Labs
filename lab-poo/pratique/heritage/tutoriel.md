# Tutoriel : héritage

## Objectif

Réutiliser les propriétés et méthodes d'une classe de base dans une classe spécialisée.

## Explication pas à pas

1. `Document` conserve un titre protégé et fournit `afficherTitre()`.
2. `Article` étend `Document` : il hérite donc de son titre et de sa méthode.
3. Son constructeur appelle `parent::__construct()` pour initialiser la partie héritée.
4. `Article` ajoute sa propre propriété d'auteur et la méthode `afficherAuteur()`.
5. Le script affiche le titre hérité puis l'auteur de l'article.

## Exécuter

Depuis `lab-poo/pratique` :

```powershell
php .\heritage\exemple.php
```

Résultat attendu :

```text
L heritage en PHP - Samira
```

## Lien avec le projet

L'exemple spécialise un document en article. Il illustre l'héritage en PHP sans modifier les modèles du projet Laravel.

## Exercice

Ajoute une classe `Rapport` qui hérite de `Document` et affiche son titre.