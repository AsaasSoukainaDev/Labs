---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    box-sizing: border-box;
    padding: 46px 62px;
    font-family: "Segoe UI", sans-serif;
    background: #F8FAFC;
    color: #172033;
    font-size: 25px;
    line-height: 1.3;
  }
  h1 { color: #172033; font-size: 1.65em; border-bottom: 4px solid #0F766E; padding-bottom: 0.2em; }
  h2 { color: #334155; font-size: 1.12em; }
  strong { color: #0F766E; }
  li { margin: 0.16em 0; }
  section.title { background: #172033; color: #F8FAFC; text-align: center; justify-content: center; }
  section.title .title-logos { display: flex; align-items: center; justify-content: center; gap: 38px; margin: 0 auto 22px; }
  section.title .title-logos img { display: block; object-fit: contain; }
  section.title .ofppt-logo { width: 100px; height: 100px; }
  section.title .title-logos .solicode-logo { width: 240px; height: 80px; object-fit: cover; object-position: center; }
  section.title h1 { color: #F8FAFC; border: 0; }
  section.title h2 { color: #D1D5DB; }
  section.problem h1 { color: #9A3412; border-color: #F97316; }
  section.solution h1 { color: #0F766E; border-color: #14B8A6; }
  pre { font-size: 18px; line-height: 1.25; background: #172033; color: #F8FAFC; border-radius: 8px; padding: 16px; }
  code { font-size: 0.82em; }
---

<!-- _class: title -->

<div class="title-logos">
  <img class="ofppt-logo" src="images/ofppt_logo.png" alt="Logo OFPPT">
  <img class="solicode-logo" src="images/logo_solicode.png" alt="Logo Solicode">
</div>

# lab-architecture

## Organisation du code en PHP

**Présenté par :** Asaas soukayna  
**Encadrant :** ES-SARRAJ Fouad  
**Date :** [Date de présentation]

---

<!-- _class: light -->

## Plan de présentation

1. Introduction et stack technique
2. Définitions des quatre notions
3. Problématique
4. Solution et mise en pratique
5. Démonstration et vérification

---

## Introduction & Stack Technique

- **Objectif :** étudier quatre notions qui aident à organiser le code d'une application PHP.
- **Environnement de référence :** PHP `^8.3`, Laravel `^13.17` et Composer.
- Les exercices sont autonomes et exécutés avec **PHP CLI**; ils simulent le stockage en mémoire et ne sont pas intégrés à Laravel.

---

<!-- _class: light -->

## Définitions : couches et données

- **Architecture 3-tiers :** séparation entre présentation, logique métier et accès aux données.
- **DAO (Data Access Object) :** objet qui regroupe les opérations d'accès aux données.

---

## Définitions : logique métier partagée

- **Service :** composant qui porte des traitements et règles métier.
- **BaseService :** classe commune qui rassemble des traitements réellement partagés entre plusieurs services.

---

<!-- _class: problem -->

## Problématique

Organiser le code d'une application PHP implique de distinguer ses responsabilités et de structurer l'accès aux données ainsi que les traitements métier. Ce lab étudie quatre notions utiles à cette organisation.

---

<!-- _class: solution -->

## Travail et solution proposés

1. Rechercher les quatre notions et expliquer leurs concepts clés.
2. Réaliser un exemple simple pour chacune dans le contexte du projet.
3. Tester les exemples et expliquer leur intégration à l'architecture.
4. Présenter les résultats dans ce support Marp.

---

<!-- _class: light -->

## Quick Start : Hello World

Depuis `lab-architecture/pratique` :

```powershell
php -v
php .\hello-world.php
```

```php
<?php
declare(strict_types=1);

echo "Hello, architecture PHP !" . PHP_EOL;
```

---

## Architecture 3-tiers

```text
Présentation CLI
      |
      v
Service métier
      |
      v
DAO -> données simulées en mémoire
```

L'exemple affiche des articles sans faire accéder directement la présentation aux données.

---

<!-- _class: light -->

## Exemples pratiques

- `architecture-3-tiers/exemple.php` : séparer présentation, service et DAO.
- `dao/exemple.php` : enregistrer et rechercher un article via un DAO.
- `service/exemple.php` : valider et publier un article dans un service.
- `base-service/exemple.php` : partager une validation commune entre services.

---

## Démonstration et vérification

- Lancer les quatre commandes listées dans `pratique/README.md`.
- Comparer chaque sortie à son tutoriel dans le sous-dossier correspondant.
- Les résultats sont simulés en mémoire; ils ne démontrent pas une intégration à la base de données ni à Laravel.