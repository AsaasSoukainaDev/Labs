# Tutoriel : DAO

## Objectif

Isoler les opérations d'accès aux données derrière un objet dédié.

## Explication pas à pas

1. `DaoArticle` transporte un identifiant et un titre.
2. `InMemoryArticleDAO` conserve les articles dans une propriété privée.
3. `enregistrer()` range un article par son identifiant.
4. `trouver()` renvoie l'article demandé ou `null` si l'identifiant est absent.
5. Le point d'entrée enregistre un article puis le recherche pour afficher son titre.

## Exécuter

Depuis `lab-architecture/pratique` :

```powershell
php .\dao\exemple.php
```

Résultat attendu :

```text
Decouvrir le DAO
```

## Lien avec l'architecture

Le DAO regroupe les opérations de données, ce qui évite de les placer dans la couche d'affichage ou dans le service. Le stockage est simulé en mémoire; aucune base de données n'est utilisée.

## Exercice

Recherche un identifiant absent et affiche un message adapté lorsque `trouver()` renvoie `null`.