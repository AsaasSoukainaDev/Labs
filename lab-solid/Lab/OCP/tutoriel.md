# OCP — Ouvert à l'extension, fermé à la modification

## Définition

OCP (Open/Closed Principle) vise à permettre l'ajout d'une variante de comportement par extension, sans modifier le code client stable à chaque nouvelle variante.

## Changement réalisé

L'ancien `BaseService` contenait une validation de libellé liée au cas d'usage. Il a été retiré. [`DisciplineService`](../../MVC_Template-main/backend/services/DisciplineService.php) dépend désormais de [`InputValidatorInterface`](../../MVC_Template-main/backend/contracts/InputValidatorInterface.php), et [`DisciplineInputValidator`](../../MVC_Template-main/backend/services/DisciplineInputValidator.php) fournit la règle par défaut.

Dans [`exemple.php`](exemple.php), `DetailedDisciplineValidator` ajoute une autre politique de validation et est injecté au même `DisciplineService`. Le service n'est pas modifié pour utiliser cette variante. `exemple-violation.php` garde un exemple très court d'une fonction qui accumule les cas particuliers.

Le point d'extension est la stratégie de validation. Pour un nouveau type d'entité, ajoutez son validateur et son service dédiés plutôt que d'ajouter un branchement sur le nom de l'entité dans un service de base partagé.

## Exécuter

Depuis `lab-solid/Lab` :

```powershell
php .\OCP\exemple-violation.php
php .\OCP\exemple.php
```

Le second exemple charge le vrai `DisciplineService`, mais utilise un dépôt en mémoire afin de ne pas dépendre de MySQL.

## Limite et exercice

La validation alternative est illustrative. Ajoutez une règle sans modifier `DisciplineService`, puis vérifiez que votre nouvelle classe respecte le contrat de `InputValidatorInterface`.
