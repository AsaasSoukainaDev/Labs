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
  section .diagram-figure { display: block; height: 470px; margin: 14px auto; object-fit: contain; border: 2px solid #CBD5E1; border-radius: 10px; }
  h1 { color: #172033; font-size: 1.65em; border-bottom: 4px solid #0F766E; padding-bottom: 0.2em; }
  h2 { color: #334155; font-size: 1.12em; }
  strong { color: #0F766E; }
  li { margin: 0.16em 0; }
  section.title { background: #172033; color: #F8FAFC; text-align: center; justify-content: center; }
  section.title .title-logos { display: flex; align-items: center; justify-content: center; gap: 30px; margin: 0 auto 18px; }
  section.title .title-logos img { display: block; object-fit: contain; }
  section.title .ofppt-logo { width: 82px; height: 82px; }
  section.title .title-logos img.solicode-logo { width: 210px; height: 70px; object-fit: cover; object-position: center; }
  section.title .cover-kicker { color: #5EEAD4; font-size: 0.62em; font-weight: 700; margin: 0 0 8px; }
  section.title h1 { color: #F8FAFC; border: 0; font-size: 2em; margin: 0.1em 0; }
  section.title h2 { color: #D1D5DB; font-size: 1.12em; margin: 0.25em 0; }
  section.title .cover-subtitle { color: #CBD5E1; font-size: 0.72em; margin: 0.5em 0 0; }
  section.title .cover-meta { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; max-width: 800px; margin: 30px auto 0; text-align: left; font-size: 0.68em; }
  section.title .cover-meta p { margin: 0; }
  section.problem h1 { color: #9A3412; border-color: #F97316; }
  section.solution h1 { color: #0F766E; border-color: #14B8A6; }
  section .process-line { display: flex; align-items: center; justify-content: center; gap: 12px; margin: 28px 0; }
  section .process-node { flex: 1; padding: 18px 12px; border: 2px solid #0F766E; background: #FFFFFF; text-align: center; font-size: 0.8em; font-weight: 700; }
  section .process-arrow { color: #0F766E; font-size: 1.1em; font-weight: 700; }
  section .workflow-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-top: 24px; }
  section .workflow-step { min-height: 100px; padding: 12px; border-left: 4px solid #0F766E; background: #E2E8F0; font-size: 0.68em; }
  section .workflow-step strong { display: block; font-size: 1.3em; margin-bottom: 6px; }
  section .usecase-diagram { display: grid; grid-template-columns: 150px 1fr; gap: 18px; align-items: center; margin: 20px 0; }
  section .usecase-actor { display: flex; flex-direction: column; align-items: center; gap: 8px; font-size: 0.72em; font-weight: 700; }
  section .usecase-person { width: 52px; height: 82px; position: relative; }
  section .usecase-head { position: absolute; top: 0; left: 18px; width: 16px; height: 16px; border: 2px solid #172033; border-radius: 50%; }
  section .usecase-torso { position: absolute; top: 18px; left: 25px; width: 2px; height: 32px; background: #172033; }
  section .usecase-arms { position: absolute; top: 30px; left: 7px; width: 38px; border-top: 2px solid #172033; }
  section .usecase-leg { position: absolute; top: 46px; left: 25px; height: 28px; border-left: 2px solid #172033; transform-origin: top; }
  section .usecase-leg-left { transform: rotate(28deg); }
  section .usecase-leg-right { transform: rotate(-28deg); }
  section .usecase-system { border: 2px solid #334155; padding: 12px 18px; background: #FFFFFF; }
  section .usecase-system-title { margin: 0 0 8px; text-align: center; font-size: 0.66em; color: #475569; }
  section .usecase-row { display: grid; grid-template-columns: 42px 1fr; align-items: center; gap: 10px; margin: 10px 0; }
  section .usecase-link { width: 117px; margin-left: -65px; border-top: 2px solid #475569; }
  section .usecase-oval { display: inline-block; padding: 8px 18px; border: 2px solid #0F766E; border-radius: 50%; text-align: center; font-size: 0.7em; }
  section .project-flow { display: flex; align-items: center; justify-content: center; gap: 8px; margin: 18px 0; }
  section .project-flow-node { padding: 12px 10px; border: 1px solid #64748B; background: #FFFFFF; text-align: center; font-size: 0.7em; }
  section .project-flow-arrow { color: #0F766E; font-weight: 700; }
  section .class-diagram { display: flex; flex-direction: column; gap: 8px; font-size: 0.58em; line-height: 1.15; }
  section .class-top { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; align-items: start; }
  section .class-box { border: 2px solid #334155; background: #FFFFFF; color: #172033; }
  section .class-name { padding: 6px 10px; background: #0F766E; color: #FFFFFF; text-align: center; font-weight: 700; }
  section .class-attributes { padding: 6px 10px; }
  section .class-methods { padding: 6px 10px; border-top: 1px solid #64748B; }
  section .class-relations { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; text-align: center; font-size: 0.88em; }
  section .class-relation { padding: 5px 8px; border-top: 2px solid #475569; }
  section .class-seance-attributes { display: grid; grid-template-columns: 1fr 1fr; gap: 0 16px; padding: 6px 10px; }
  pre { font-size: 18px; line-height: 1.25; background: #172033; color: #F8FAFC; border-radius: 8px; padding: 16px; }
  code { font-size: 0.82em; }
---

<!-- _class: title -->

<div class="title-logos">
  <img class="ofppt-logo" src="images/ofppt_logo.png" alt="Logo OFPPT">
  <img class="solicode-logo" src="images/logo_solicode.png" alt="Logo Solicode">
</div>

<p class="cover-kicker">Lab technique · Programmation PHP</p>

# lab-conception-orientée objet

## Concevoir une application orientée objet

<p class="cover-subtitle">Du besoin au workflow, puis au code PHP</p>

<div class="cover-meta">
  <p><strong>Présenté par</strong><br>Asaas soukayna</p>
  <p><strong>Encadrant</strong><br>ES-SARRAJ Fouad</p>
  
</div>

---

<!-- _class: light -->

## Plan

1. Introduction à la conception logicielle.
2. Problématique : pourquoi concevoir avant de coder ?
3. Workflow de conception orientée objet en huit étapes.
4. Application du workflow au projet de salle de sport.
5. Quick Start et démonstration.
6. Tests et vérification.

---

## Partie 1 · Introduction à la conception logicielle

La conception logicielle prépare la structure de l'application avant le développement.

<div class="process-line">
  <div class="process-node">Besoin</div><span class="process-arrow">→</span>
  <div class="process-node">Conception</div><span class="process-arrow">→</span>
  <div class="process-node">Développement</div><span class="process-arrow">→</span>
  <div class="process-node">Tests</div>
</div>

---

<!-- _class: problem -->

## Partie 2 · Pourquoi concevoir avant de coder ?

Une seule classe qui affiche, vérifie et enregistre mélange plusieurs rôles.

| Sans conception | Avec une conception claire |
|:--|:--|
| Code désorganisé | Parties identifiées |
| Rôles mélangés | Responsabilités définies |
| Modifications dispersées | Changements mieux localisés |

La conception aide à organiser le travail; elle ne supprime pas toutes les erreurs.

---

<!-- _class: light -->

## Partie 3 · Workflow de conception orientée objet

<div class="workflow-grid">
  <div class="workflow-step">
    <strong>01</strong>
    Analyser le besoin et comprendre l'utilisateur
  </div>
  <div class="workflow-step">
    <strong>02</strong>
    Identifier les objets et les classes
  </div>
  <div class="workflow-step">
    <strong>03</strong>
    Définir les responsabilités
  </div>
  <div class="workflow-step">
    <strong>04</strong>
    Définir les attributs et les méthodes
  </div>
  <div class="workflow-step">
    <strong>05</strong>
    Identifier les relations entre les classes
  </div>
  <div class="workflow-step">
    <strong>06</strong>
    Représenter la conception avec UML
  </div>
  <div class="workflow-step">
    <strong>07</strong>
    Vérifier et valider la conception
  </div>
  <div class="workflow-step">
    <strong>08</strong>
    Passer à l'implémentation PHP
  </div>
</div>

On part de la compréhension du besoin, on construit et valide le modèle, puis on passe à l'implémentation.

---

<!-- _class: problem -->

## Étape 1 · Analyser le besoin et comprendre l'utilisateur

**Objectif :** comprendre le problème et identifier les attentes de l'utilisateur.

- **Empathie :** comprendre ses besoins et ses difficultés.
- **Besoins :** recueillir les attentes.
- **Fonctionnalités :** identifier les actions attendues.
- **Périmètre :** définir les limites du projet.

**Résultat :** un besoin clair, des fonctionnalités identifiées et un périmètre défini.

---

## Étape 2 · Identifier les objets et les classes

**Objectif :** repérer les concepts utiles du domaine métier.

1. Relever les éléments importants du besoin.
2. Identifier les objets qu'ils représentent.
3. Créer une classe seulement si elle a des données ou un rôle nécessaire.

**Exemple :** `Discipline` est un objet métier; le formulaire est un élément d'interface, pas automatiquement une classe.

**Résultat :** une liste de classes candidates, sans classe inutile.

---

<!-- _class: light -->

## Étape 3 · Définir les responsabilités

Une classe = un rôle clair.

| Classe du diagramme | Responsabilité générale |
|:--|:--|
| `Coach` | Représenter les informations d'un coach. |
| `Discipline` | Représenter une discipline sportive. |
| `Seance` | Représenter une séance sportive. |

Le tableau explique le rôle des classes du modèle, sans décrire l'architecture interne de l'application.

---

## Étape 4 · Définir les attributs et les méthodes

## Projet · Classes du diagramme UML

| Classe | Responsabilité |
|:--|:--|
| `Coach` | Représenter les informations d'un coach. |
| `Discipline` | Représenter une discipline sportive. |
| `Seance` | Représenter une séance sportive et ses informations. |

**Relations :**
- Un `Coach` anime plusieurs `Seance`.
- Une `Discipline` est liée à plusieurs `Seance`.

---

<!-- _class: light -->

## Étape 5 · Identifier les relations entre les classes

| Relation | Sens | Exemple ou décision |
|:--|:--|:--|
| Association | Deux classes collaborent. | Le contrôleur utilise le repository. |
| Agrégation | Groupe d'objets indépendants. | À confirmer selon le domaine. |
| Composition | Les composants dépendent du cycle de vie du tout. | Non déduite des fonctions demandées. |
| Héritage | Relation « est un ». | Ne pas en ajouter sans besoin. |

Le diagramme fourni indique aussi les multiplicités : un coach ou une discipline est lié à `0..*` séances.

---

## Étape 6 · Représenter la conception avec UML

UML aide à expliquer la conception avant le code.

| Diagramme | Question à laquelle il répond |
|:--|:--|
| Use Case | Quelles fonctions l'utilisateur peut-il demander ? |
| Classes | Quelles classes, données, méthodes et relations ? |
| Séquence | Quels objets échangent, et dans quel ordre ? |

Visibilités : `+` public, `-` privé, `#` protégé. Multiplicités : `1`, `0..*`.

---

<!-- _class: light -->

## Étape 7 · Vérifier et valider la conception

**Avant de coder, vérifier :**

- les rôles et relations sont clairs;
- les diagrammes racontent le même système;
- le modèle couvre ajout et affichage, sans fonctions en plus;
- la conception peut être traduite en PHP.

**Résultat :** une conception simple, cohérente et liée au besoin.

---

## Étape 8 · Passer à l'implémentation PHP

**Objectif :** transformer les éléments validés en classes et collaborations.

**Flux :** classes → attributs et méthodes → collaborations → interface → tests progressifs.

Exemple pédagogique de contrat, à adapter à la conception retenue :

```php
<?php
interface DisciplineRepository
{
    public function ajouter($discipline);
    public function lister();
}
```

---

<!-- _class: light -->

## Partie 4 · Appliquer le workflow au projet

**Besoin :** application web de gestion de salle de sport.

<div class="process-line">
  <div class="process-node">Ajouter une discipline</div>
  <div class="process-node">Afficher les disciplines enregistrées</div>
</div>

**Stack :** PHP orienté objet, Tailwind CSS et UML.

Le stockage et les choix d'architecture ne sont pas précisés dans le README.

---

## Projet · Étape 1 — Besoin et utilisateur

**Objectif :** comprendre le besoin et les grandes parties de l'application.

**Ce qu'on fait :** par empathie, se demander ce dont l'utilisateur a besoin; relever les fonctions attendues et la limite du projet; proposer un premier découpage général.

**Exemple :** l'utilisateur ajoute une discipline ou affiche la liste. Les grandes parties envisagées sont l'interface, le traitement des demandes et l'accès aux données.

**Décision :** garder uniquement ces deux fonctions. Le stockage reste à décider; ce premier découpage ne définit pas encore les classes.

---

## Projet · Classes proposées

| Classe | Responsabilité |
|:--|:--|
| `Coach` | Représenter les informations d'un coach. |
| `Discipline` | Représenter une discipline sportive. |
| `Seance` | Représenter une séance sportive et ses informations. |

**Relations :**
- Un `Coach` anime plusieurs `Seance`.
- Une `Discipline` est liée à plusieurs `Seance`.

---

## Projet · Diagramme de cas d'utilisation

<div class="usecase-diagram">
  <div class="usecase-actor">
    <div class="usecase-person">
      <span class="usecase-head"></span>
      <span class="usecase-torso"></span>
      <span class="usecase-arms"></span>
      <span class="usecase-leg usecase-leg-left"></span>
      <span class="usecase-leg usecase-leg-right"></span>
    </div>
    <span>Utilisateur</span>
  </div>
  <div class="usecase-system">
    <p class="usecase-system-title">Application de salle de sport</p>
    <div class="usecase-row"><span class="usecase-link"></span><span class="usecase-oval">Ajouter une discipline</span></div>
    <div class="usecase-row"><span class="usecase-link"></span><span class="usecase-oval">Afficher les disciplines enregistrées</span></div>
  </div>
</div>

L'acteur générique est relié aux deux fonctions connues. Aucun autre rôle ni droit n'est supposé.

---

<!-- _class: light -->

## Projet · Diagramme de classes fourni

<img class="diagram-figure" src="images/diagramme-classes.png" alt="Diagramme UML">

---

## Projet · Parcours des fonctions

**Ajouter**
<div class="project-flow">
  <div class="project-flow-node">Formulaire</div><span class="project-flow-arrow">→</span>
  <div class="project-flow-node">Controller</div><span class="project-flow-arrow">→</span>
  <div class="project-flow-node">Discipline<br><code>libelle</code></div><span class="project-flow-arrow">→</span>
  <div class="project-flow-node">Repository<br><code>ajouter()</code></div>
</div>

**Afficher**
<div class="project-flow">
  <div class="project-flow-node">Controller</div><span class="project-flow-arrow">→</span>
  <div class="project-flow-node">Repository<br><code>lister()</code></div><span class="project-flow-arrow">→</span>
  <div class="project-flow-node">Liste</div><span class="project-flow-arrow">→</span>
  <div class="project-flow-node">Vue</div>
</div>

`DisciplineRepository` définit les opérations. `DisciplineController` coordonne; la vue présente le résultat.

---

<!-- _class: light -->

## Partie 5 · Quick Start · Hello World

Depuis PowerShell avec PHP CLI installé :

```powershell
php -v
php -r 'echo "Hello, conception orientée objet !" . PHP_EOL;'
```

Le README ne fixe pas de version minimale. Vérifier la version disponible avec `php -v` avant de développer.

---

## Partie 6 · Tests et vérification

| Test | Action | Résultat attendu |
|:--|:--|:--|
| Ajout | Ajouter une discipline. | Discipline enregistrée. |
| Liste vide | Consulter la liste. | Liste vide affichée. |
| Liste renseignée | Consulter la liste. | Disciplines affichées. |
| Responsive | Tester sur plusieurs écrans. | Interface adaptée. |
| Collaborations | Vérifier les appels entre classes et les liens UML/PHP. | Rôles et relations cohérents. |

Réaliser les tests progressivement pendant le développement, puis compléter par une vérification globale.

**Résultats et choix réellement retenus :** à compléter après le développement et les tests.