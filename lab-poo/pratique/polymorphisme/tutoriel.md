# Tutoriel : polymorphisme

## Objectif

Appeler la même méthode sur des formats différents et obtenir un résultat adapté à chaque classe.

## Explication pas à pas

1. `FormatArticle` déclare la méthode abstraite `formater()`.
2. `FormatTexte` et `FormatHtml` héritent de cette classe et fournissent deux implémentations différentes.
3. `afficherArticle()` accepte la classe de base et appelle `formater()` sans connaître le format concret.
4. Les deux appels utilisent la même fonction, mais produisent une sortie texte puis HTML.

## Exécuter

Depuis `lab-poo/pratique` :

```powershell
php .\polymorphisme\exemple.php
```

Résultat attendu :

```text
Article : Le polymorphisme
<h1>Le polymorphisme</h1>
```

## Lien avec le projet

Le polymorphisme permet à un code appelant de traiter différents formats via une même abstraction. Cet exemple reste une démonstration autonome.

## Exercice

Ajoute un format Markdown qui implémente `formater()`.