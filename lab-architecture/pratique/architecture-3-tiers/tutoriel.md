# Tutoriel : architecture 3-tiers

## Objectif

Séparer l'affichage, les traitements applicatifs et l'accès aux données.

## Explication pas à pas

1. `TierArticle` représente les données d'un article.
2. `TierArticleDAO` joue le rôle de couche d'accès aux données et fournit une liste en mémoire.
3. `TierArticleService` reçoit une abstraction `TierArticleSource` et prépare les titres nécessaires à l'affichage.
4. `TierArticlePresentation` affiche les titres sans accéder directement aux données.
5. Le point d'entrée crée les objets et transmet le résultat du service à la présentation.

## Exécuter

Depuis `lab-architecture/pratique` :

```powershell
php .\architecture-3-tiers\exemple.php
```

Résultat attendu :

```text
Articles :
- Organiser le code
- Separer les responsabilites
```

## Lien avec l'architecture

Le script illustre trois responsabilités distinctes. La couche de présentation est une sortie CLI, et les données du DAO sont simulées en mémoire; cet exemple n'est pas intégré à l'application Laravel.

## Exercice

Ajoute un article au DAO et vérifie qu'il apparaît sans modifier la classe de présentation.