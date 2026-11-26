# ISP — Ségrégation des interfaces

## Définition

ISP (Interface Segregation Principle) recommande de ne pas forcer un client à dépendre d'opérations qu'il n'utilise pas. On préfère des interfaces ciblées à une interface générale trop large.

## Changement réalisé

Le projet expose [`DisciplineReaderInterface`](../../MVC_Template-main/backend/contracts/DisciplineReaderInterface.php) pour `findAll()` et [`DisciplineWriterInterface`](../../MVC_Template-main/backend/contracts/DisciplineWriterInterface.php) pour `add()`. [`DisciplineDAO`](../../MVC_Template-main/backend/models/DisciplineDAO.php) implémente les deux, mais un client en lecture seule peut ne dépendre que du lecteur.

Dans [`exemple.php`](exemple.php), `afficherCatalogue()` ne reçoit qu'un lecteur et `creerDiscipline()` ne reçoit qu'un écrivain. Les implémentations de démonstration ne sont donc pas obligées de fournir l'autre capacité. `DisciplineService` reçoit les deux interfaces, car ses cas d'usage actuels incluent la lecture et la création.

## Exécuter

Depuis `lab-solid/Lab` :

```powershell
php .\ISP\exemple-violation.php
php .\ISP\exemple.php
```

Le premier scénario provoque l'opération de repas inutile d'un robot. Le second affiche le catalogue et confirme la création demandée.

## Limite et exercice

Le DAO concret implémente les deux interfaces car il sait faire les deux opérations. Si les lectures et écritures changent de stockage ou de droits, composez deux adaptateurs distincts.
