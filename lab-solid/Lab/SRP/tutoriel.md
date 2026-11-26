# SRP — Responsabilité unique appliquée au projet

## Définition

SRP (Single Responsibility Principle) recommande qu'un module ait une responsabilité cohérente et une raison principale de changer.

## Changement réalisé

Avant, `Discipline` héritait de `DisciplineDAO` et son constructeur appelait le parent. L'entité métier portait donc aussi le lien vers l'accès aux données.

Le code est maintenant réparti ainsi :

- [`Discipline.php`](../../MVC_Template-main/backend/models/Discipline.php) contient l'identité et les données d'une discipline, ainsi que `toArray()`.
- [`DisciplineDAO.php`](../../MVC_Template-main/backend/models/DisciplineDAO.php) exécute les requêtes PDO.
- [`DisciplineService.php`](../../MVC_Template-main/backend/services/DisciplineService.php) orchestre les cas d'usage lister et ajouter.
- [`DisciplineInputValidator.php`](../../MVC_Template-main/backend/services/DisciplineInputValidator.php) valide les données reçues.
- [`DisciplineController.php`](../../MVC_Template-main/backend/controllers/DisciplineController.php) traduit la requête HTTP en réponse JSON.

Le scénario visible dans [`exemple.php`](exemple.php) instancie l'entité et sérialise ses données sans ouvrir de connexion SQL. Cela illustre la séparation entre représentation métier et persistance.

## Exécuter

Depuis `lab-solid/Lab` :

```powershell
php .\SRP\exemple.php
```

La sortie est un objet JSON avec l'identifiant, le libellé et la description de `Cardio`.

## Limite et exercice

`toArray()` est conservé sur l'entité pour garder une conversion simple. Pour une API plus grande, créez un formateur de réponse dédié afin de séparer aussi le format HTTP du modèle métier.

## Vérifier les fichiers PHP concernés

Depuis la racine `lab-solid` :

```powershell
php -l .\MVC_Template-main\backend\models\Discipline.php
php -l .\MVC_Template-main\backend\models\DisciplineDAO.php
```
