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
  section.title h1 { color: #F8FAFC; border: 0; }
  section.title h2 { color: #D1D5DB; }
  section.problem h1 { color: #9A3412; border-color: #F97316; }
  section.solution h1 { color: #0F766E; border-color: #14B8A6; }
  pre { font-size: 18px; line-height: 1.25; background: #172033; color: #F8FAFC; border-radius: 8px; padding: 16px; }
  code { font-size: 0.82em; }
---

<!-- _class: title -->

# lab-conception-poo

## Conception orientée objet en PHP

**Présenté par :** asaas soukayna  
**Encadrant :** ES-SARRAJ Fouad  


---

<!-- _class: light -->

## Plan de présentation

1. Introduction à la POO et stack technique
2. Concepts fondamentaux et relations entre les classes
3. Principes de conception et SOLID
4. Problématique et analyse du besoin
5. UML et réalisation de l'application
6. Tests, démonstration et références

---

## Introduction & Stack Technique

- **Objectif :** apprendre à passer d'un besoin à une conception orientée objet claire et maintenable.
- **PHP :** langage utilisé pour les exemples et l'application.
- **Tailwind CSS :** création de l'interface responsive.
- **UML :** représentation des classes et de leurs relations avant le développement.
- **Périmètre fonctionnel :** ajouter et afficher des disciplines sportives, sans créer un système complet de salle de sport.

---

<!-- _class: light -->

## Pourquoi utiliser la POO ?

- En programmation procédurale, le code est souvent organisé en fonctions qui manipulent des données.
- En POO, les données et les actions liées sont organisées dans des objets.
- Cette organisation aide à répartir les responsabilités et à réutiliser le code.
- La POO demande aussi de bien concevoir les classes : trop de classes ou trop de dépendances peuvent rendre le code difficile.

**Exemple du lab :** une discipline sportive peut être représentée par un objet avec des données et des comportements associés.

---

<!-- _class: light -->

## Définitions : bases de la POO

- **Classe :** modèle qui définit les données et comportements communs à des objets.
- **Objet :** instance concrète d'une classe.
- **Attribut :** donnée portée par un objet.
- **Méthode :** action ou comportement défini dans une classe.
- **Constructeur :** méthode appelée lors de la création d'un objet pour initialiser son état.

---

## Exemple : classe et objet

Exemple pédagogique autonome, à adapter à la conception réelle du projet :

```php
<?php
class Discipline
{
  public $nom;

  public function __construct($nom)
  {
    $this->nom = $nom;
  }
}

$discipline = new Discipline('Yoga');
echo $discipline->nom;
```

`Discipline` est la classe; `$discipline` est un objet créé à partir de cette classe.

---

## Définitions : organisation et relations

- **Encapsulation :** protéger l'état d'un objet et contrôler son accès.
- **Héritage :** spécialiser une classe en réutilisant une classe de base.
- **Polymorphisme :** appeler un comportement commun dont l'exécution varie selon l'objet.
- **Abstraction et interface :** exprimer un modèle ou un contrat commun sans imposer une implémentation unique.
- **Association :** deux objets collaborent ou sont liés.
- **Agrégation :** un objet regroupe d'autres objets qui peuvent exister séparément.
- **Composition :** un objet est constitué d'autres objets dont le cycle de vie dépend de lui.

---

<!-- _class: light -->

## Encapsulation : contrôler les données

Une propriété privée n'est pas modifiée directement depuis l'extérieur. Une méthode contrôle le changement.

```php
<?php
class Discipline
{
  private $nom;

  public function __construct($nom)
  {
    $this->nom = $nom;
  }

  public function getNom()
  {
    return $this->nom;
  }
}
```

Ici, l'accès au nom passe par `getNom()`. Les règles de validation du projet restent à définir.

---

## Abstraction, interface et polymorphisme

- Une **interface** définit les méthodes qu'une classe doit fournir.
- Une **classe abstraite** peut partager du code et laisser certaines méthodes aux classes dérivées.
- Le **polymorphisme** permet d'appeler une même méthode sur des objets différents.

```php
<?php
interface Affichable
{
  public function afficher();
}

function presenter(Affichable $element)
{
  echo $element->afficher();
}
```

Les classes qui implémentent `Affichable` peuvent produire leur propre affichage.

---

<!-- _class: light -->

## Principes de conception

- **Responsabilité unique (SRP) :** une classe a une responsabilité principale.
- **Forte cohésion :** les éléments d'une classe servent un même rôle.
- **Faible couplage :** les classes dépendent le moins possible les unes des autres.
- **Composition ou héritage :** choisir selon la relation réelle entre les objets; ne pas utiliser l'héritage seulement pour partager du code.

---

<!-- _class: light -->

## SOLID : les cinq principes

- **SRP :** une classe, une responsabilité principale.
- **OCP :** permettre d'ajouter un comportement sans modifier sans cesse le code existant.
- **LSP :** une classe dérivée doit pouvoir remplacer sa classe de base sans casser le programme.
- **ISP :** préférer plusieurs petits contrats à une interface trop large.
- **DIP :** faire dépendre la logique importante de contrats, plutôt que de détails techniques.

Ces principes aident à faire évoluer le code. Ils ne demandent pas de créer une abstraction pour chaque classe.

---

## SOLID en pratique : responsabilités et extension

**SRP, à éviter :** une même classe valide les données, les enregistre et génère le HTML.  
**Amélioration :** séparer ces responsabilités selon les besoins du projet.

**OCP, idée :** utiliser un contrat pour ajouter une nouvelle manière d'afficher sans modifier le code qui appelle l'affichage.

```php
<?php
interface FormatAffichage
{
  public function formater($texte);
}

function afficher($format, $texte)
{
  echo $format->formater($texte);
}
```

Exemple de principe; ce n'est pas une architecture déjà choisie pour l'application.

---

<!-- _class: light -->

## SOLID en pratique : substituer et séparer

- **LSP, à éviter :** une classe enfant change le sens ou les règles d'une méthode héritée.
- **Amélioration :** ne pas créer cette relation d'héritage si l'enfant ne respecte pas le contrat de la classe de base.
- **ISP, à éviter :** obliger une classe à fournir des méthodes qu'elle n'utilise pas.
- **Amélioration :** découper le contrat en interfaces plus petites.

```php
<?php
interface Lisible
{
  public function lister();
}

interface Ajoutable
{
  public function ajouter($element);
}
```

Les exemples illustrent les principes; les contrats finaux dépendent de la conception UML.

---

## SOLID en pratique : inverser les dépendances

**À éviter :** une classe métier crée elle-même un stockage précis et ne peut pas facilement en changer.

**Amélioration :** la classe reçoit un objet qui respecte un contrat.

```php
<?php
interface DepotDisciplines
{
  public function ajouter($discipline);
  public function lister();
}

class GestionDisciplines
{
  private $depot;

  public function __construct(DepotDisciplines $depot)
  {
    $this->depot = $depot;
  }
}
```

Le stockage utilisé par l'application n'est pas précisé dans le README.

---

<!-- _class: problem -->

## Problématique et besoin

> Comment analyser le besoin d'une application de gestion de salle de sport et concevoir une structure orientée objet en PHP qui soit claire, organisée, réutilisable et facile à maintenir ?

**Périmètre fonctionnel :** ajouter des disciplines et afficher la liste. Le projet ne vise pas à développer un système complet de gestion de salle de sport.

---

<!-- _class: solution -->

## Solution proposée

- Étudier les notions POO et les bonnes pratiques, avec des exemples PHP simples.
- Analyser les deux fonctions attendues, puis identifier les objets, classes, données, méthodes et relations nécessaires.
- Représenter la conception dans un diagramme UML et expliquer les choix faits.
- Développer en PHP l'ajout et l'affichage des disciplines, avec une interface responsive Tailwind CSS.
- Tester les fonctions et vérifier les interactions entre les classes.

**Choix de conception effectivement retenus :** à compléter après l'analyse et la réalisation.

---

<!-- _class: light -->

## UML : préparer le développement

Un diagramme de classes peut présenter :

- Les classes et leurs noms.
- Les attributs et les méthodes.
- La visibilité : `+` public, `-` privé, `#` protégé.
- Les relations entre classes et leurs multiplicités, par exemple `1` ou `0..*`.

Le diagramme final doit représenter les classes réellement choisies pour l'application et être expliqué à l'oral.

---

## Quick Start : Hello World

Depuis un terminal avec PHP CLI installé :

```powershell
php -v
php -r 'echo "Hello, POO en PHP !" . PHP_EOL;'
```

La première commande affiche la version disponible. Le README ne fixe pas de version minimale. La seconde exécute un exemple autonome sans dépendance au projet.

---

<!-- _class: light -->

## Conception et démonstration

- **Diagramme UML :** à compléter avec les classes, attributs, méthodes et relations réellement retenus.
- **Démonstration :** ajouter une discipline puis vérifier qu'elle apparaît dans la liste.
- **Tests fonctionnels :** vérifier l'ajout et l'affichage de plusieurs disciplines.
- **Tests de conception :** vérifier les méthodes des classes et leurs interactions.
- **Interface :** vérifier l'affichage responsive sur différentes tailles d'écran.
- **Résultats, captures et difficultés rencontrées :** à renseigner après exécution de l'application.

**Livrable :** application au périmètre limité, diagramme UML et présentation des choix de conception et des résultats.

---

<!-- _class: light -->

## Références à consulter

- Manuel PHP : [php.net/manual/fr](https://www.php.net/manual/fr/)
- Documentation Tailwind CSS : [tailwindcss.com/docs](https://tailwindcss.com/docs)
- Spécification UML : [omg.org/spec/UML](https://www.omg.org/spec/UML/)

Ajouter les autres sources réellement consultées pendant les recherches.