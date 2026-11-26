# DIP — Inversion des dépendances

## Définition

DIP (Dependency Inversion Principle) invite la logique métier à dépendre d'abstractions. Les détails concrets sont choisis et injectés au point de composition de l'application.

## Changement réalisé

Avant, `DisciplineService` exécutait `new Discipline()`, et le modèle était lui-même lié au DAO par héritage. Maintenant, le service reçoit `DisciplineReaderInterface`, `DisciplineWriterInterface` et `InputValidatorInterface` dans son constructeur.

Le fichier [`api.php`](../../MVC_Template-main/backend/api/api.php) est le point de composition : il crée `DisciplineDAO`, le validateur, le service puis le contrôleur. L'exemple [`exemple.php`](exemple.php) assemble le même service avec un dépôt en mémoire pour montrer l'injection sans base de données.

## Chemin d'exécution

1. `api.php` choisit le DAO PDO et `DisciplineInputValidator`.
2. Le contrôleur reçoit le service.
3. Le service appelle l'abstraction de lecture, d'écriture ou de validation dont il a besoin.
4. Pour un POST valide, le DAO exécute l'INSERT; pour GET, il convertit les lignes SQL en entités `Discipline`.

## Exécuter

Depuis `lab-solid/Lab` :

```powershell
php .\DIP\exemple-violation.php
php .\DIP\exemple.php
```

Le script amélioré utilise le vrai service et un adaptateur en mémoire; sa sortie ne requiert pas MySQL.

## Limite et exercice

L'API conserve une composition manuelle avec `require_once`, adaptée à ce petit projet sans Composer. Ajoutez un autre adaptateur de stockage qui implémente les contrats, puis assemblez-le dans un point d'entrée distinct.
