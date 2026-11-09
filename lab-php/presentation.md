---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    box-sizing: border-box;
    padding: 48px 64px;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", sans-serif;
    background: #F8FAFC;
    color: #0F172A;
    font-size: 26px;
    line-height: 1.32;
  }
  h1 { color: #0F172A; font-size: 1.7em; font-weight: 750; border-bottom: 4px solid #14B8A6; padding-bottom: 0.2em; }
  h2 { color: #334155; font-size: 1.12em; font-weight: 650; }
  strong { color: #0F766E; }
  ul { line-height: 1.4; }
  li { margin: 0.18em 0; }
  section.title { background: #0F172A; color: #F8FAFC; text-align: center; justify-content: center; }
  section.title h1 { color: #F8FAFC; border: 0; }
  section.title h2 { color: #CBD5E1; }
  section.problem h1 { color: #B45309; border-color: #F59E0B; }
  section.solution h1 { color: #0F766E; border-color: #14B8A6; }
  pre { font-size: 18px; line-height: 1.25; background: #0F172A; color: #F8FAFC; border-radius: 12px; padding: 18px; }
  code { font-size: 0.82em; }
  section.solution pre { font-size: 17px; }
---

<!-- _class: title -->

# lab-php

## Gestion des erreurs, namespaces et traits

**Présenté par :** Asaas soukayna  
**Encadrant :** ES-SARRAJ Fouad

---

<!-- _class: light -->

## Plan de Présentation

1. Introduction & Stack Technique
2. Définitions
3. Problème
4. Solution

---

## Introduction & Stack Technique

- **Compétence : Développement de la partie back-end.**
- **3.0.U1 — PHP moderne** et **3.0.U2 — POO essentielle** : exceptions, namespaces et traits.

- **Stack étudiée :** PHP 8.3 et PHP CLI. les exercices restent autonomes, sans framework ni base de données.
---

<!-- _class: light -->

## Définitions

- **Erreurs et exceptions :** détection et traitement des situations anormales en PHP.
- **Namespace :** organisation des classes et prévention des conflits de noms.
- **Trait :** réutilisation de méthodes dans plusieurs classes.

---

<!-- _class: problem -->

## Travail demandé

1. Rechercher les trois notions et en expliquer les concepts clés.
2. Réaliser un exemple pratique pour chacune dans le contexte du projet.
3. Vérifier les exemples et expliquer leur intégration à l'architecture.

---

<!-- _class: solution -->

## Solution et mise en pratique

- Créer un exemple PHP pour chacune des trois notions : exceptions, namespaces et traits.
- Exécuter les exemples et observer leurs résultats pour comprendre le fonctionnement de chaque notion.

---

<!-- _class: solution -->

## Démonstrations et livrables

- Exécuter `php .\erreurs-exceptions\exemple.php`, `php .\namespaces\demo.php` et `php .\traits\exemple.php` depuis `lab-php/pratique`.
- Vérifier le refus d'un titre vide, l'affichage de l'article trouvé et les dates de création de l'article et du commentaire.
- Livrables : trois exemples PHP exécutables et leurs tutoriels pas à pas.
