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

# Rédiger un prompt clair et précis

---

<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## Introduction

Un prompt est une consigne donnée à une IA pour obtenir une réponse utile.

- Objectif : décrire clairement une tâche à réaliser.
- Éléments : contexte, objectif, consignes, résultat attendu.
- Méthode : tester, évaluer puis améliorer avec un agent IA.

---

<!-- _class: light -->

## Problems Encountered

Aucun problème technique bloquant n’est requis pour cet exercice.

Des prompts vagues créent souvent des résultats imprécis :

- Le contexte du projet manque.
- L’objectif mélange plusieurs tâches.
- Les contraintes et le format de sortie sont absents.
- L’IA doit deviner les détails importants.

---

## Solutions Implemented

Structurer le prompt en quatre parties :

1. **Contexte** : projet, public et situation.
2. **Objectif** : une tâche concrète.
3. **Consignes** : contraintes, étapes et limites.
4. **Résultat attendu** : format et critères de réussite.

Si une information essentielle manque, demander à l’agent de poser une question.

---

<!-- _class: light -->

## Construire un prompt

Utiliser ce canevas, puis remplacer chaque élément entre crochets :

````text
Contexte : [projet et public concernés]
Objectif : [tâche précise à réaliser]
Consignes : [contraintes, étapes, éléments à éviter]
Résultat attendu : [format et critères de réussite]
````

Un prompt utile est spécifique, vérifiable et limité à une tâche.

---

## Exemple : améliorer un formulaire

```text
Contexte : portfolio statique réalisé par des débutants.
Objectif : créer un formulaire de contact accessible.
Consignes : utiliser HTML et CSS; ajouter des libellés explicites;
adapter la mise en page au mobile; ne pas ajouter de dépendance.
Résultat attendu : fournir index.html et style.css, puis expliquer
comment vérifier les champs et l’affichage mobile.
```

Le contexte et les limites réduisent les interprétations inutiles.

---

<!-- _class: light -->

## Tester avec un agent IA

1. Donner le prompt à un agent IA et lui demander d’exécuter la tâche.
2. Comparer sa réponse au résultat attendu.
3. Vérifier les contraintes une par une.
4. Repérer les oublis, suppositions et éléments hors sujet.

**Grille de contrôle :** contexte respecté, fichiers attendus, contraintes
suivies, réponse exploitable.

---

## Améliorer puis retester

Si l’agent suppose qu’un serveur doit traiter le formulaire, préciser la limite :

```text
Le formulaire est une maquette front-end. N’ajoute ni serveur ni envoi réel.
Si une information nécessaire manque, pose une question avant de coder.
```

Relancer le même test et comparer la nouvelle réponse avec la grille.

---

<!-- _class: light -->

## En bref

- Décrire le contexte et formuler un objectif unique.
- Donner des consignes mesurables et le format de sortie.
- Tester la réponse avec un agent IA.
- Améliorer le prompt à partir des écarts observés.

**Un bon prompt se vérifie et s’améliore par itérations.**
