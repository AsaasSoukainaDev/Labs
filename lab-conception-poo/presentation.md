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
3. Workflow de conception orientée objet en neuf étapes.
4. Application du workflow au projet de salle de sport.
5. Quick Start et démonstration.
6. Tests et vérification.

---

## Partie 1 · Introduction à la conception logicielle

La conception logicielle consiste à réfléchir à la structure d'une application avant de commencer son développement.

Elle aide à décider :

- comment organiser l'application;
- quelles sont ses grandes parties;
- comment ces parties vont travailler ensemble.

**Objectif :** préparer une structure claire avant d'écrire le code.

---

<!-- _class: problem -->

## Partie 2 · Pourquoi concevoir avant de coder ?

Imaginons une classe qui affiche les formulaires, vérifie les données, enregistre les informations et affiche les résultats.

- Le code devient difficile à comprendre.
- Les modifications deviennent compliquées.
- Les responsabilités sont mélangées.
- Les erreurs sont plus difficiles à trouver.

**Réponse :** réfléchir à l'organisation de l'application avant de commencer à coder.

---

<!-- _class: light -->

## Partie 3 · Workflow de conception orientée objet

1. Analyser le besoin.
2. Réaliser la conception préliminaire.
3. Identifier les objets et les classes.
4. Définir les responsabilités.
5. Définir les attributs et les méthodes.
6. Identifier les relations entre les classes.
7. Représenter la conception avec UML.
8. Vérifier et valider la conception.
9. Passer à l'implémentation PHP.

À chaque étape : poser une question, prendre une décision, puis la vérifier avec le besoin.

---

<!-- _class: problem -->

## Étape 1 · Analyser le besoin

**Objectif :** comprendre le résultat attendu.

**Méthode :** relever les fonctions et les limites du projet.

**Exemple :** ajouter une discipline sportive et afficher les disciplines enregistrées.

**Décision :** ne pas ajouter d'autres fonctions de gestion de salle de sport.

---

## Étape 2 · Réaliser la conception préliminaire

**Objectif :** définir les grandes parties de l'application avant de détailler les classes.

**Méthode :** repérer les principaux rôles et les échanges entre eux, sans choisir les détails techniques qui ne sont pas précisés.

**Exemple :** pour la salle de sport, prévoir une interface pour ajouter et lister, un traitement PHP et une partie qui gère les données des disciplines.

**Décision :** conserver ce découpage général; le stockage n'est pas précisé dans le README.

---

## Étape 3 · Identifier les objets et les classes

**Objectif :** repérer les éléments utiles du besoin.

**Méthode :** relever les noms, puis vérifier si chacun a des données ou un rôle propre.

**Exemple :** `Discipline` est un objet du domaine. Le formulaire est un élément d'interface, pas forcément une classe métier.

**Décision :** ne pas transformer chaque nom en classe.

---

<!-- _class: light -->

## Étape 4 · Définir les responsabilités

**Objectif :** donner un rôle clair à chaque classe.

**Méthode :** compléter « cette classe est responsable de… ».

**Exemple proposé :** `Discipline` représente une discipline; un contrôleur coordonne l'ajout et la liste.

**Décision :** éviter une classe qui lit le formulaire, enregistre les données et génère toute la page.

---

## Étape 5 · Définir les attributs et les méthodes

**Objectif :** garder les données et actions nécessaires.

**Exemple proposé :** `Discipline` porte un `nom`; les opérations attendues sont `ajouter()` et `lister()`.

**Question de contrôle :** quelle fonction du besoin utilise cet attribut ou cette méthode ?

Le README ne précise pas d'autres champs ni les règles de validation : ils restent à définir.

---

<!-- _class: light -->

## Étape 6 · Identifier les relations entre les classes

- **Association :** deux classes collaborent.
- **Agrégation :** un objet regroupe des objets qui peuvent exister séparément.
- **Composition :** les composants dépendent du cycle de vie de l'objet qui les possède.
- **Héritage :** à utiliser seulement si un objet « est un » autre type.

**Exemple proposé :** le contrôleur utilise un contrat d'accès aux disciplines. Aucune hiérarchie de disciplines n'est nécessaire dans le besoin actuel.

---

## Étape 7 · Représenter la conception avec UML

- Une classe montre son nom, ses attributs et ses méthodes.
- Visibilité : `+` public, `-` privé, `#` protégé.
- Une flèche montre une relation ou une dépendance.
- Les multiplicités (`1`, `0..*`) indiquent combien d'objets sont liés.

**Méthode :** partir des classes et rôles définis, puis ajouter seulement les relations utiles.

---

<!-- _class: light -->

## Étape 8 · Vérifier et valider la conception

Vérifier que :

- chaque classe a un rôle clair;
- les relations correspondent aux besoins;
- l'ajout et l'affichage sont possibles;
- le modèle ne contient pas de fonctions hors périmètre;
- l'UML pourra correspondre au code PHP.

**Bonnes pratiques :** responsabilité claire, faible couplage et forte cohésion.

---

## Étape 9 · Passer à l'implémentation PHP

**Objectif :** transformer les éléments validés en classes et collaborations.

**Méthode :** coder les classes du modèle, relier les appels, puis construire l'interface.

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

**Fonctions :**

- ajouter une discipline;
- afficher les disciplines enregistrées.

**Stack :** PHP orienté objet, Tailwind CSS et UML.

Le stockage et les choix d'architecture ne sont pas précisés dans le README.

---

## Projet · Conception préliminaire

**Objectif :** définir les grandes parties de l'application avant de détailler les classes.

**Méthode :** repérer l'interface, le traitement des demandes et la gestion des données.

**Exemple proposé :** une interface responsive pour ajouter et lister; un traitement PHP pour ces demandes; une partie qui fournit les disciplines à afficher.

**Décision :** garder ce découpage général. Le README ne précise pas le stockage; il reste à décider.

---

## Projet · Classes proposées

| Classe proposée | Rôle |
|:--|:--|
| `Discipline` | Représenter une discipline. |
| `DisciplineRepository` | Définir l'ajout et la lecture. |
| `DisciplineController` | Coordonner la demande. |
| Vue | Afficher formulaire et liste avec Tailwind CSS. |

Cette organisation est une proposition de travail, pas une architecture déjà réalisée.

---

<!-- _class: light -->

## Projet · Diagramme de classes fourni

```text
Coach
  - int id_coach, string nom, string prenom
  - string telephone, string email, string photo
  + getters()

Discipline
  - int id_discipline, string libelle
  - string description
  + getters()

Seance
  - int id_seance, string titre, date date_seance
  - time heure_debut, int duree_minutes, string niveau
  - int nb_places, decimal prix, boolean actif
  - int id_coach, int id_discipline
  + getters()

Coach "1" -- "0..*" Seance : anime
Discipline "1" -- "0..*" Seance : contient
```

<small>Source Mermaid : [classe-diagramme.md](classe-diagramme.md). Coach et Seance dépassent le périmètre du README, centré sur l'ajout et la liste des disciplines.</small>

---

## Projet · Parcours des fonctions

**Ajouter :** formulaire → contrôleur → discipline → dépôt.  
**Afficher :** contrôleur → dépôt → liste → vue Tailwind.

Le contrôleur coordonne; la vue présente les données. Le dépôt représente un contrat, sans imposer ici un type de stockage.

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

- Tester l'ajout d'une discipline.
- Tester l'affichage d'une liste vide puis renseignée.
- Vérifier les interactions entre les classes.
- Vérifier l'interface responsive.
- Comparer les relations UML au code PHP.

**Résultats et choix réellement retenus :** à compléter après le développement et les tests.