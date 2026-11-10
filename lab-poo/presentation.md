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

# lab-poo

## Six notions de la POO en PHP

**Présenté par :** Asaas soukayna  
**Encadrant :** ES-SARRAJ Fouad


---

<!-- _class: light -->

## Plan de présentation

1. Introduction et stack technique
2. Définitions des six notions
3. Problématique
4. Solution et mise en pratique
5. Démonstration des exemples

---

## Introduction & Stack Technique

- **Sujet :** six notions de programmation orientée objet en PHP.
- **Environnement du projet :** PHP `^8.3`, Laravel `^13.17` et Composer.
- Les exemples se lancent avec **PHP CLI** et sont autonomes; ils utilisent des articles fictifs et ne sont pas intégrés à l'application Laravel.

---

<!-- _class: light -->

## Définitions : structures et contrats

- **Classe abstraite :** classe modèle qui peut partager du code et imposer des méthodes aux classes dérivées.
- **Interface :** contrat qui déclare les méthodes qu'une classe doit fournir.
- **Héritage :** mécanisme par lequel une classe dérivée réutilise et spécialise une classe de base.

---

## Définitions : comportements et accès

- **Polymorphisme :** même appel de méthode, comportements différents selon l'objet concret.
- **Encapsulation :** protection des données d'un objet et contrôle de leur lecture ou modification.
- **Méthodes et propriétés statiques :** éléments rattachés à la classe plutôt qu'à une instance particulière.

---

<!-- _class: problem -->

## Problématique

Les tutoriels n'abordent pas encore les six notions de POO ciblées par ce lab. Il faut donc en comprendre les concepts et apprendre à les appliquer dans le contexte du projet.

---

<!-- _class: solution -->

## Solution proposée

1. Rechercher les six notions et expliquer leurs concepts clés.
2. Réaliser un exemple pratique pour chacune dans le contexte du projet.
3. Tester les exemples et expliquer leur intégration à l'architecture.
4. Présenter les résultats dans ce support Marp.

---

<!-- _class: light -->

## Quick Start : Hello World

Depuis le dossier `lab-poo/pratique` :

```powershell
php -v
php .\hello-world.php
```

```php
<?php
declare(strict_types=1);

echo "Hello, POO en PHP !" . PHP_EOL;
```

---

## Exemples pratiques : classes et contrats

- `classes-abstraites/exemple.php` : imposer une méthode de description à un article.
- `interfaces/exemple.php` : définir un contrat de publication.
- `heritage/exemple.php` : spécialiser un document en article.

---

<!-- _class: light -->

## Exemples pratiques : comportements et données

- `polymorphisme/exemple.php` : produire plusieurs formats avec la même méthode.
- `encapsulation/exemple.php` : contrôler la modification du titre d'un article.
- `statique/exemple.php` : compter les articles créés avec une propriété de classe.

---

## Démonstration et vérification

- Exécuter les six scripts depuis `lab-poo/pratique`; les commandes détaillées sont dans `pratique/README.md`.
- Vérifier le résultat attendu dans le tutoriel associé à chaque notion.
- Résultats de l'exécution et explication de l'intégration : à compléter après les tests.