# Tutoriel : Service

## Objectif

Placer une règle métier dans un service et laisser le DAO responsable de l'enregistrement.

## Explication pas à pas

1. `ServiceArticle` représente l'article créé par l'exercice.
2. `ServiceArticleDAO` conserve les articles et expose `enregistrer()` et `tous()`.
3. `PublicationService` reçoit le DAO par son constructeur; il ne gère pas lui-même le stockage.
4. `publier()` nettoie le titre et refuse une valeur vide avant de créer et enregistrer l'article.
5. Le point d'entrée appelle le service et affiche le titre retourné.

## Exécuter

Depuis `lab-architecture/pratique` :

```powershell
php .\service\exemple.php
```

Résultat attendu :

```text
Article publie : Comprendre les services
```

## Lien avec l'architecture

Le service porte ici une règle métier, tandis que le DAO s'occupe de conserver les données. Le stockage reste simulé en mémoire; le code n'est pas intégré à Laravel.

## Exercice

Ajoute un test de titre vide et décide à quel niveau l'exception doit être interceptée.