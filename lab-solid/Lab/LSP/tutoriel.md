# LSP — Substitution de Liskov

## Définition

LSP (Liskov Substitution Principle) indique qu'une implémentation peut remplacer l'abstraction attendue sans casser les garanties sur lesquelles le code client s'appuie.

## Changement réalisé

[`DisciplineService`](../../MVC_Template-main/backend/services/DisciplineService.php) reçoit des dépôts via les interfaces de lecture et d'écriture. [`DisciplineDAO`](../../MVC_Template-main/backend/models/DisciplineDAO.php) est l'adaptateur PDO de production. [`exemple.php`](exemple.php) fournit `InMemoryDisciplineStore`, qui implémente les mêmes contrats et peut remplacer le DAO pendant l'exécution du service.

Le script liste une discipline, en ajoute une, puis reliste les données. Le service n'a pas besoin de connaître la classe concrète du dépôt. L'exemple de comparaison avec l'autruche montre au contraire une sous-classe qui casse la promesse de sa classe parente.

## Exécuter

Depuis `lab-solid/Lab` :

```powershell
php .\LSP\exemple-violation.php
php .\LSP\exemple.php
```

Le premier script termine avec l'exception intentionnelle. Le second affiche d'abord Yoga, puis Yoga et Cardio.

## Limite et exercice

Une signature compatible ne suffit pas : les implémentations doivent aussi respecter les mêmes attentes sur les valeurs et les effets. Ajoutez un adaptateur en mémoire qui renvoie plusieurs disciplines et vérifiez que la sortie reste au format convenu.
