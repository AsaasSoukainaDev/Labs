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

# lab-conception-poo

## Concevoir une application en POO

<p class="cover-subtitle">Du besoin au workflow, puis au code PHP</p>

<div class="cover-meta">
  <p><strong>Présenté par</strong><br>Asaas soukayna</p>
  <p><strong>Encadrant</strong><br>ES-SARRAJ Fouad</p>
  <p><strong>Date</strong><br>À compléter</p>
</div>

---

<!-- _class: light -->

## Plan

1. Comprendre la conception POO.
2. Suivre le workflow en huit étapes.
3. Appliquer ce workflow à l'application de salle de sport.

---

## Partie 1 · Comprendre la conception POO

- **Programmer en POO :** écrire avec des classes et des objets.
- **Concevoir en POO :** décider quelles classes sont utiles, leurs rôles et leurs relations avant de coder.
- Concevoir évite de mélanger formulaire, règles métier, stockage et affichage dans une seule classe.
- Une bonne conception reste simple, compréhensible et facile à modifier.

---

<!-- _class: light -->

## Partie 2 · Workflow en huit étapes

1. Analyser le besoin.
2. Identifier les objets et les classes.
3. Définir les responsabilités.
4. Choisir les attributs et les méthodes.
5. Identifier les relations.
6. Représenter les classes en UML.
7. Vérifier la conception.
8. Passer au code PHP.

À chaque étape : poser une question, prendre une décision, puis la vérifier avec le besoin.

---

<!-- _class: problem -->

## Étape 1 · Analyser le besoin

**Objectif :** comprendre le résultat attendu.

**Méthode :** relever les fonctions et les limites du projet.

**Exemple :** ajouter une discipline sportive et afficher les disciplines enregistrées.

**Décision :** ne pas ajouter d'autres fonctions de gestion de salle de sport.

---

## Étape 2 · Identifier objets et classes

**Objectif :** repérer les éléments utiles du besoin.

**Méthode :** relever les noms, puis vérifier si chacun a des données ou un rôle propre.

**Exemple :** `Discipline` est un objet du domaine. Le formulaire est un élément d'interface, pas forcément une classe métier.

**Décision :** ne pas transformer chaque nom en classe.

---

<!-- _class: light -->

## Étape 3 · Définir les responsabilités

**Objectif :** donner un rôle clair à chaque classe.

**Méthode :** compléter « cette classe est responsable de… ».

**Exemple proposé :** `Discipline` représente une discipline; un contrôleur coordonne l'ajout et la liste.

**Décision :** éviter une classe qui lit le formulaire, enregistre les données et génère toute la page.

---

## Étape 4 · Choisir données et méthodes

**Objectif :** garder les données et actions nécessaires.

**Exemple proposé :** `Discipline` porte un `nom`; les opérations attendues sont `ajouter()` et `lister()`.

**Question de contrôle :** quelle fonction du besoin utilise cet attribut ou cette méthode ?

Le README ne précise pas d'autres champs ni les règles de validation : ils restent à définir.

---

<!-- _class: light -->

## Étape 5 · Identifier les relations

- **Association :** deux classes collaborent.
- **Agrégation :** un objet regroupe des objets qui peuvent exister séparément.
- **Composition :** les composants dépendent du cycle de vie de l'objet qui les possède.
- **Héritage :** à utiliser seulement si un objet « est un » autre type.

**Exemple proposé :** le contrôleur utilise un contrat d'accès aux disciplines. Aucune hiérarchie de disciplines n'est nécessaire dans le besoin actuel.

---

## Étape 6 · Représenter en UML

- Une classe montre son nom, ses attributs et ses méthodes.
- Visibilité : `+` public, `-` privé, `#` protégé.
- Une flèche montre une relation ou une dépendance.
- Les multiplicités (`1`, `0..*`) indiquent combien d'objets sont liés.

**Méthode :** partir des classes et rôles définis, puis ajouter seulement les relations utiles.

---

<!-- _class: light -->

## Étape 7 · Vérifier la conception

Vérifier que :

- chaque classe a un rôle clair;
- les relations correspondent aux besoins;
- l'ajout et l'affichage sont possibles;
- le modèle ne contient pas de fonctions hors périmètre;
- l'UML pourra correspondre au code PHP.

**Bonnes pratiques :** responsabilité claire, faible couplage et forte cohésion.

---

## Étape 8 · Passer au code PHP

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

## Partie 3 · Appliquer le workflow au projet

**Besoin :** application web de gestion de salle de sport.

**Fonctions :**

- ajouter une discipline;
- afficher les disciplines enregistrées.

**Stack :** PHP POO, Tailwind CSS et UML.

Le stockage et les choix d'architecture ne sont pas précisés dans le README.

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

## Projet · Diagramme UML proposé

```text
+---------------------------+
| Discipline                |
+---------------------------+
| - nom: string             |
+---------------------------+
| + nom(): string           |
+---------------------------+

DisciplineController ..> DisciplineRepository
DisciplineRepository ..> Discipline : 0..*

«interface» DisciplineRepository
+ ajouter(Discipline): void
+ lister(): Discipline[]
```

À confirmer après l'analyse. Le stockage, les validations et les classes finales restent à décider.

---

## Projet · Parcours des fonctions

**Ajouter :** formulaire → contrôleur → discipline → dépôt.  
**Afficher :** contrôleur → dépôt → liste → vue Tailwind.

Le contrôleur coordonne; la vue présente les données. Le dépôt représente un contrat, sans imposer ici un type de stockage.

---

<!-- _class: light -->

## Quick Start · Hello World

Depuis PowerShell avec PHP CLI installé :

```powershell
php -v
php -r 'echo "Hello, conception POO !" . PHP_EOL;'
```

Le README ne fixe pas de version minimale. Vérifier la version disponible avec `php -v` avant de développer.

---

## Tests et livrable

- Tester l'ajout d'une discipline.
- Tester l'affichage d'une liste vide puis renseignée.
- Vérifier les interactions entre les classes.
- Vérifier l'interface responsive.
- Comparer les relations UML au code PHP.

**Résultats et choix réellement retenus :** à compléter après le développement et les tests.