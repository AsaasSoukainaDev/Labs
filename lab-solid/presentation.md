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

**Présenté par :** Asaas Soukayna  
**Encadrant :** ES-Sarraj Fouad  


---

<!-- _class: light -->

## Plan

1. Introduction et stack technique
2. Définitions des principes SOLID
3. Problème constaté dans la conception initiale
4. Application des principes au projet
5. Démonstrations et vérification
6. Conclusion

---

## Introduction et stack technique

- **PHP 8 orienté objet**, sans framework ni autoload Composer.
- **Projet :** gestion des disciplines d'une salle de sport.
- **Architecture :** API HTTP, contrôleur, service, entité, DAO PDO et MySQL.
- Les exercices de `pratique/` sont autonomes et utilisent un stockage mémoire; aucun accès MySQL n'est nécessaire pour les lancer.

### Quick Start

Depuis la racine `lab-solid` :

```powershell
php -v
php .\pratique\hello-world.php
php .\pratique\DIP\exemple.php
```

Résultat : `Bonjour SOLID !`

---

<!-- _class: light -->

## SRP — Responsabilité unique

**Définition :** un module doit porter une responsabilité cohérente et avoir une raison principale de changer.

**Application :** dans `pratique/SRP/exemple.php`, la version « avant » valide, stocke et formate dans une seule classe. La version « après » sépare ces responsabilités entre validateur, dépôt, presenter et service.



---

## OCP — Ouvert à l'extension, fermé à la modification

**Définition :** ajouter une variante de comportement en étendant le système sans modifier le code client stable.

**Application :** `ValidateurLibelle` reçoit des règles qui implémentent `RegleValidation`. On peut ajouter une règle, comme `SansChiffres`, sans modifier l'orchestrateur.



---

<!-- _class: light -->

## LSP — Substitution de Liskov

**Définition :** une implémentation doit pouvoir remplacer le contrat attendu sans casser les garanties du code client.

**Définition concrète :** LSP est respecté lorsqu'une implémentation peut remplacer une autre implémentation du même contrat sans changer le résultat attendu ni provoquer d'erreur inattendue.

**Application :** un DAO MySQL et un dépôt mémoire implémentent les mêmes contrats, par exemple `DisciplineReaderInterface` et `DisciplineWriterInterface`. `DisciplineService` reçoit ces interfaces et peut utiliser l'un ou l'autre adaptateur sans connaître sa classe concrète. Le service ne dépend pas d'une relation d'héritage avec le DAO.
---

## ISP — Ségrégation des interfaces

**Définition :** un client ne dépend que des opérations dont il a besoin; préférer des contrats ciblés à une interface trop large.

**Application :** les besoins GET et POST sont séparés en contrats de lecture et d'écriture. Un client qui ne liste que les disciplines n'a pas à dépendre de la méthode d'ajout.



---

<!-- _class: light -->

## DIP — Inversion des dépendances

**Définition :** la logique applicative dépend d'abstractions; les détails concrets sont fournis au point de composition.

**Application :** le point de composition choisit les dépendances et les transmet au service. Le lecteur et l'écrivain correspondent aux contrats séparés par ISP; le validateur porte les règles d'entrée.

```php
$service = new DisciplineService($reader, $writer, $validator);
```

`$reader` implémente `DisciplineReaderInterface`, `$writer` implémente `DisciplineWriterInterface` et `$validator` implémente `InputValidatorInterface`.

---

<!-- _class: problem -->

## Problème rencontré dans la conception initiale

Le service `DisciplineService` instanciait directement le `DisciplineDAO`, créant un couplage fort. Cela rendait difficile l'écriture de tests unitaires sans une base de données MySQL active. La validation des données était également éparpillée dans le service, ce qui violait le SRP.

---

<!-- _class: solution -->

## Solution proposée

- Créer `DisciplineReaderInterface` et `DisciplineWriterInterface` pour découpler le service du DAO (DIP) et fournir des contrats ciblés (ISP).
- Injecter le lecteur, l'écrivain et le validateur dans `DisciplineService` au lieu d'instancier le DAO dans le service.
- Créer `DisciplineInputValidator` pour isoler la validation (SRP) et permettre d'ajouter des variantes (OCP).
- Assembler les implémentations concrètes au point d'entrée de l'application.

---

## Vérification

- Les exemples pratiques se lancent depuis la racine `lab-solid` avec `php .\pratique\DIP\exemple.php`.
- L'API conserve les champs JSON attendus par le frontend : `id_discipline`, `libelle`, `description`, puis `success` et `message` pour POST.
- **Dette technique temporaire :** le frontend n'envoie pas encore `id_science`, alors que la base le demande. Lors de la mise à jour du formulaire, ce champ devra être transmis et rendu obligatoire, ou la colonne et l'API devront être modifiées ensemble pour l'autoriser à être nullable. En attendant, le DAO choisit la science ayant le plus petit identifiant.
- La vérification HTTP GET/POST complète nécessite une base MySQL configurée.
