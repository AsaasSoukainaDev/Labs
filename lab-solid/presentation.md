---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section { box-sizing: border-box; padding: 48px 64px; font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", sans-serif; background: #F8FAFC; color: #0F172A; font-size: 25px; line-height: 1.3; }
  h1 { color: #0F172A; font-size: 1.6em; border-bottom: 4px solid #14B8A6; padding-bottom: 0.2em; }
  h2 { color: #334155; }
  strong { color: #0F766E; }
  section.title { background: #0F172A; color: #F8FAFC; text-align: center; justify-content: center; }
  section.title h1 { color: #F8FAFC; border: 0; }
  section.title h2 { color: #CBD5E1; }
  section.light { background: #F1F5F9; }
  section.problem h1 { color: #B45309; border-color: #F59E0B; }
  section.solution h1 { color: #0F766E; border-color: #14B8A6; }
  pre { font-size: 17px; line-height: 1.2; background: #0F172A; color: #F8FAFC; border-radius: 12px; padding: 14px; }
---

<!-- _class: title -->

# lab-solid

## Les cinq principes SOLID appliqués à une application PHP MVC

**Présenté par :** [nom et prénom]  
**Encadrant :** [nom de l'encadrant]  
**Date :** [date de présentation]

---

<!-- _class: light -->

## Plan

1. Introduction et stack technique
2. Définitions des principes SOLID
3. Changements appliqués au projet MVC
4. Vérification des exemples et de l'API
5. Problème réel et solution à documenter

---

## Introduction et stack technique

- **PHP 8 orienté objet**, sans framework ni autoload Composer.
- **Projet :** gestion des disciplines d'une salle de sport.
- **Architecture :** API HTTP, contrôleur, service, entité, DAO PDO et MySQL.
- Les exemples d'application utilisent le vrai service et des adaptateurs mémoire; aucun accès MySQL n'est nécessaire pour les lancer.

### Quick Start

Depuis `lab-solid/Lab` :

```powershell
php -v
php .\hello-world.php
```

Résultat : `Bonjour SOLID !`

---

<!-- _class: light -->

## SRP — Responsabilité unique

**Définition :** un module doit porter une responsabilité cohérente et avoir une raison principale de changer.

**Application :** `Discipline` ne fait plus l'accès SQL par héritage. L'entité, le DAO, le service, le validateur et le contrôleur ont des rôles séparés.

**Fichiers :** `backend/models/Discipline.php`, `DisciplineDAO.php`, `services/DisciplineService.php`, `controllers/DisciplineController.php`.

---

## OCP — Ouvert à l'extension, fermé à la modification

**Définition :** ajouter une variante de comportement en étendant le système sans modifier le code client stable.

**Application :** `DisciplineService` reçoit `InputValidatorInterface`; une autre stratégie de validation peut être injectée sans changer le service. `BaseService` et sa validation spécifique ont été supprimés.

**Fichiers :** `backend/contracts/InputValidatorInterface.php`, `services/DisciplineInputValidator.php`, `services/DisciplineService.php`.

---

<!-- _class: light -->

## LSP — Substitution de Liskov

**Définition :** une implémentation doit pouvoir remplacer le contrat attendu sans casser les garanties du code client.

**Application :** `DisciplineDAO` et `InMemoryDisciplineStore` fournissent lecture et écriture. Le même `DisciplineService` fonctionne avec l'un ou l'autre.

**Fichiers :** les interfaces Reader/Writer, `DisciplineDAO.php` et `Lab/LSP/exemple.php`.

---

## ISP — Ségrégation des interfaces

**Définition :** un client ne dépend que des opérations dont il a besoin; préférer des contrats ciblés à une interface trop large.

**Application :** lecture et écriture ont chacune leur interface. Un catalogue en lecture seule n'a pas à déclarer `add()`.

**Fichiers :** `backend/contracts/DisciplineReaderInterface.php` et `DisciplineWriterInterface.php`.

---

<!-- _class: light -->

## DIP — Inversion des dépendances

**Définition :** la logique applicative dépend d'abstractions; les détails concrets sont fournis au point de composition.

**Application :** le service reçoit ses contrats au constructeur. `backend/api/api.php` assemble DAO, validateur, service et contrôleur.

```php
$service = new DisciplineService($dao, $dao, $validator);
```

---

<!-- _class: problem -->

## Problème concret du projet

**À compléter par l'apprenant :**

- Quel comportement réel a motivé l'analyse ?
- Comment le reproduire ?
- Quel résultat inattendu a été observé ?

Les constats architecturaux ci-dessus proviennent de la lecture du code; ils ne sont pas présentés comme un incident vécu.

---

<!-- _class: solution -->

## Changements et vérification

- Les exemples appliqués et leurs tutoriels sont dans `Lab/`.
- L'API garde les champs JSON attendus par le frontend : `id_discipline`, `libelle`, `description`, puis `success` et `message` pour POST.
- Le DAO associe une nouvelle discipline à la science ayant le plus petit identifiant, car le formulaire actuel ne transmet pas `id_science`.
- La vérification HTTP GET/POST requiert un MySQL local configuré; la base n'était pas disponible pour cette exécution.

**Solution proposée pour le problème réel :** [à compléter par l'apprenant]
