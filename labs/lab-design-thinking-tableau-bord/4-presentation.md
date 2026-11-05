---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section { background-color: #0f172a; color: #f8fafc; font-family: 'Inter', system-ui, sans-serif; padding: 40px 60px; font-size: 22px; }
  h1 { font-family: 'Inter', sans-serif; font-size: 42px; color: #38bdf8; }
  h2 { font-family: 'Inter', sans-serif; font-size: 32px; color: #38bdf8; border-bottom: 1px solid rgba(56, 189, 248, 0.3); padding-bottom: 10px; }
  section.light { background-color: #f8fafc; color: #0f172a; }
  section.light h1, section.light h2 { color: #0284c7; border-bottom: 1px solid rgba(2, 132, 199, 0.2); }
  table { width: 100%; border-collapse: collapse; font-size: 18px; margin-top: 15px; }
  th { background: #1e293b; color: #38bdf8; padding: 10px; border: 1px solid #334155; }
  td { padding: 8px 12px; border: 1px solid #334155; }
  section.light th { background: #e2e8f0; color: #0284c7; border: 1px solid #cbd5e1; }
  section.light td { border: 1px solid #cbd5e1; }
  pre, code { font-family: ui-monospace, monospace; font-size: 16px; }
---

# Lab Design Thinking — Tableau de bord Livecoding

---
<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems
3. Solutions

---

## Introduction

- **Objectif :** Concevoir un tableau de bord ergonomique pour le suivi des séances et des projets
- **Périmètre :** Structurer l'expérience apprenant et optimiser la préparation du livecodeur
- **Concepts clés :** Démarche Design Thinking, 5 étapes, 7 besoins d'Empathie, POV, HMW, Prototypage HTML/CSS

---
<!-- _class: light -->

## Problems Encountered

- **Dispersion des échéances :** Aucune visibilité centralisée sur la date annoncée et le prochain livecoding
- **Absence de hiérarchisation :** Projets prioritaires noyés au milieu du catalogue général
- **Blocages invisibles :** Difficulté d'identifier les tâches critiques en « Révision nécessaire »
- **Surcharge cognitive :** Absence de volet d'alertes repliable et manque d'accès direct pour le livecodeur

---

## Solutions Implemented

- **Démarche Design Thinking :** Cadrage rigoureux centré utilisateur en remplacement de la conception intuitive
- **Intégration des 7 besoins :** Traduction directe des constats d'Empathie en exigences d'interface
- **Cadrage Définition :** Formulation d'un Point de Vue (POV) focalisé sur le gain de temps du livecodeur
- **Idéation & Prototype :** Création d'une interface responsive avec vue rapide et alertes extensibles

---
<!-- _class: light -->

## Principes du Design Thinking

- **Centré sur l’humain :** Partir des besoins réels observés sur le terrain (Empathie)
- **Itératif et collaboratif :** Construire, confronter et améliorer continuellement les idées
- **Biais vers l’action :** Passer rapidement à des prototypes visuels pour tester la viabilité

---

## Les 5 étapes du Design Thinking

1. **Empathie :** Immersion et recueil des attentes utilisateurs
2. **Définition :** Cadrage du problème sous forme de Point de Vue (POV)
3. **Idéation :** Génération d'idées et sélection de composants ergonomiques
4. **Prototype :** Matérialisation concrète d'une interface testable
5. **Test :** Expérimentation et validation par les usagers finaux

---
<!-- _class: light -->

## Empathie : Les 7 besoins identifiés

| N° | Besoin utilisateur exprimé | Cible principale |
|:---:|:---|:---|
| **1 & 2** | Annonce de la date et affichage du prochain livecoding | Apprenants & Livecodeur |
| **3** | Projets « en cours » par priorité (+ accès catalogue complet) | Apprenants & Livecodeur |
| **4 & 5** | Tâches « en cours » et tâches « Révision nécessaire » | Apprenants & Livecodeur |
| **6** | Notifications visibles et extensibles au clic | Promotion |
| **7** | Accès direct aux éléments « en cours » (mode rapide) | Livecodeur |

---

## Définition : Point de Vue & Questions HMW

- **Problem Statement :** Dispersion des informations et perte de temps lors de la préparation du livecoding
- **Point de Vue (POV) :** *Le livecodeur* a besoin d'un *accès direct et hiérarchisé aux dates, projets prioritaires et révisions* parce que *l'animation d'une séance en direct ne tolère aucune recherche laborieuse*
- **Questions « How Might We » (HMW) :**
  - Comment afficher le prochain livecoding sans encombrer la vue ?
  - Comment isoler visuellement les révisions urgentes ?
  - Comment offrir un filtre rapide « En cours » en un clic ?

---
<!-- _class: light -->

## Idéation : Solutions d'interface pour les 7 besoins

- **Besoins 1 & 2 :** Bannière en-tête avec badge d'accentuation et date officielle
- **Besoin 3 :** Grille de cartes de projets avec badge de priorité rouge/orange + bascule « Tous »
- **Besoin 4 :** Liste d'état montrant les tâches en développement actif
- **Besoin 5 :** Boîte d'alerte spécifique avec bordure tiretée et avertissement orange
- **Besoin 6 :** Panneau extensible interactif exploitant `<details><summary>`
- **Besoin 7 :** Bouton d'action rapide « Vue Livecodeur (En cours) »

---

## Idéation : Zoning du tableau de bord

```
+------------------------------------------------------------------------+
| EN-TÊTE : Prochain Livecoding (Date annoncée)      [Bouton Livecodeur] |
+---------------------------------------------------+--------------------+
| SECTION PRINCIPALE (2/3)                          | VOLET LATÉRAL(1/3) |
| - Projets en cours par priorité (+ lien catalogue)|                    |
| - Tâches actives en cours                         | - Centre d'alertes |
| - [ALERTE] Tâches en « Révision nécessaire »      | - Notifications    |
|                                                   |   extensibles      |
+---------------------------------------------------+--------------------+
```

---
<!-- _class: light -->

## Implémentation : En-tête Livecoding (Besoins 1, 2 & 7)

```html
<!-- En-tête : Date annoncée, prochaine session et bouton livecodeur -->
<header class="header-banner">
  <div>
    <span class="badge-live">Prochain Livecoding</span>
    <h2>Jeudi 14h00 : Conception d'API & Design Thinking</h2>
    <small>Date annoncée : 30 Octobre 2026</small>
  </div>
  <button class="btn-livecoder">Vue Livecodeur (En cours)</button>
</header>
```

---

## Implémentation : Projets & Révisions (Besoins 3, 4 & 5)

```html
<!-- Projets prioritaires et distinction des révisions nécessaires -->
<section class="card">
  <div class="card-header">
    <h3>Projets en cours (par priorité)</h3>
    <a href="#all">Tous les projets (12) →</a>
  </div>
  <div class="priority-item urgent">Priorité 1 : Lab Design Thinking</div>
  <div class="priority-item warning">Priorité 2 : API Laravel — Auth</div>
  
  <div class="revision-box">
    <strong>⚠️ Révision nécessaire :</strong>
    <p>Validation du schéma relationnel — retour formateur en attente.</p>
  </div>
</section>
```

---
<!-- _class: light -->

## Implémentation : Notifications extensibles (Besoin 6)

```html
<!-- Volet latéral interactif avec notification dépliable au clic -->
<aside class="card">
  <h3>Centre d'alertes</h3>
  <details open>
    <summary>Notifications visibles (3)</summary>
    <ul>
      <li>Nouvelle révision requise sur le Lab.</li>
      <li>Date du livecoding confirmée pour jeudi 14h.</li>
      <li>Mise à jour du backlog de projet.</li>
    </ul>
  </details>
</aside>
```

---

## Validation et Résultats

- **Conformité fonctionnelle :** Les 7 besoins d'Empathie disposent d'un composant dédié
- **Expérience utilisateur :** Visibilité immédiate des urgences sans charge cognitive superflue
- **Livrables :** Document de cadrage, maquette Marp standard et prototype HTML/CSS autonome
