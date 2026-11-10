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
  section.title .title-logos { display: flex; align-items: center; justify-content: center; gap: 40px; margin: 0 auto 24px; }
  section.title .title-logos img { display: block; object-fit: contain; }
  section.title .ofppt-logo { width: 104px; height: 104px; }
  section.title .title-logos .solicode-logo { width: 250px; height: 84px; object-fit: cover; object-position: center; }
  section.title h1 { color: #F8FAFC; border: 0; }
  section.title h2 { color: #CBD5E1; }
  section.problem h1 { color: #B45309; border-color: #F59E0B; }
  section.solution h1 { color: #0F766E; border-color: #14B8A6; }
  pre { font-size: 18px; line-height: 1.25; background: #0F172A; color: #F8FAFC; border-radius: 12px; padding: 18px; }
  code { font-size: 0.82em; }
  section.solution pre { font-size: 17px; }
---

<!-- _class: title -->

<div class="title-logos">
  <img class="ofppt-logo" src="images/ofppt_logo.png" alt="Logo OFPPT">
  <img class="solicode-logo" src="images/logo_solicode.png" alt="Logo Solicode">
</div>

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

## Problématique

Les erreurs ne sont pas encore correctement gérées, les namespaces ne sont pas maîtrisés et le partage de code entre plusieurs classes reste difficile à mettre en place.

---

<!-- _class: solution -->

## Solution et mise en pratique

- Créer un exemple PHP de gestion des erreurs avec les exceptions, un exemple d'organisation des classes avec les namespaces et un exemple de partage de code avec un trait.
- Exécuter chaque exemple et observer le résultat pour comprendre comment utiliser ces trois notions.

---

<!-- _class: solution -->

## Démonstrations et livrables

- Exécuter `php .\erreurs-exceptions\exemple.php`, `php .\namespaces\demo.php` et `php .\traits\exemple.php` depuis `lab-php/pratique`.
- Vérifier le refus d'un titre vide, l'affichage de l'article trouvé et les dates de création de l'article et du commentaire.
- Livrables : trois exemples PHP exécutables et leurs tutoriels pas à pas.
