---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    background: #183b39;
    color: #f6f7f2;
    font-family: "Aptos", "Segoe UI", sans-serif;
  }

  section h1,
  section h2 {
    color: #ffd08a;
  }

  section code,
  section pre {
    background: #294946;
    color: #f6f7f2;
  }

  section.light {
    background: #fbfaf6;
    color: #183b39;
  }

  section.light h1,
  section.light h2 {
    color: #a94732;
  }

  section.light code,
  section.light pre {
    background: #e9efeb;
    color: #183b39;
  }

  section.lead {
    align-items: center;
    justify-content: center;
    text-align: center;
  }
---

<!-- _class: lead -->

# Préparer un lab technique autour d’un blog

---

<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## Introduction

Un lab transforme un besoin réel en exercice technique court et vérifiable.

- But : préparer un lab à partir d’un besoin lié à un blog.
- Stack étudiée : Laravel, PHP, Blade et SQLite.
- Technique testée : filtrer des articles avec Eloquent.

---

<!-- _class: light -->

## Problems Encountered

Aucun incident technique bloquant : le point de départ est un besoin à préciser.

« Améliorer le blog » est trop vague :

- Quel utilisateur rencontre quel problème ?
- Quelle fonctionnalité faut-il réaliser ?
- Quelle technique sera étudiée ?
- Comment saura-t-on que le lab est réussi ?

---

## Solutions Implemented

Transformer le besoin en lab avec cinq décisions :

1. Décrire le problème côté utilisateur.
2. Définir un objectif limité et observable.
3. Découper le travail en étapes.
4. Choisir une technique ou une bibliothèque à tester.
5. Écrire des critères d’acceptation et des tests.

---

<!-- _class: light -->

## Du besoin au problème

**Besoin :** les visiteurs veulent retrouver les articles d’un sujet précis.

**Problème :** le blog affiche tous les articles dans une seule liste, sans filtre.

**Périmètre :** filtrer la liste par catégorie.

**Hors périmètre :** authentification, commentaires et création d’articles.

---

## Définir le travail à faire

1. Vérifier les modèles `Article` et `Category`.
2. Ajouter ou confirmer la relation et la clé `category_id`.
3. Lire la catégorie demandée dans la route.
4. Filtrer les articles et afficher la liste dans Blade.
5. Prévoir une catégorie inconnue ou sans article.

**Résultat attendu :** chaque catégorie affiche uniquement ses articles.

---

<!-- _class: light -->

## Choisir la technique à étudier

**Stack du lab :** Laravel, PHP, Blade et base SQLite de test.

**Technique :** filtrage côté base avec Eloquent, plutôt qu’après chargement
de tous les articles.

```php
$articles = Article::query()
    ->where('category_id', $categoryId)
    ->latest()
    ->get();
```

**Question d’évaluation :** le filtrage est-il lisible et exécuté par la base ?

---

## Tester la solution

- Une catégorie avec des articles affiche uniquement ceux-ci.
- Une catégorie sans article affiche un état vide compréhensible.
- Une catégorie inconnue est gérée sans erreur inattendue.
- Sans filtre, le comportement défini du blog reste cohérent.

Utiliser SQLite et des données de test reproductibles.

---

<!-- _class: light -->

## Fiche de lab prête à rédiger

- **Problème :** les visiteurs ne peuvent pas retrouver les articles par sujet.
- **Objectif :** filtrer les articles du blog par catégorie.
- **Solution :** relation Eloquent, requête filtrée, affichage Blade.
- **Étapes :** modèle, route, requête, vue, tests.
- **Validation :** vérifier les cas filtré, vide et inconnu.

**Un bon lab relie un besoin précis à une réalisation testable.**
