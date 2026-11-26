# Lab SOLID — PHP et application MVC

## Objectif

Découvrir SRP, OCP, LSP, ISP et DIP, puis suivre leur application dans `MVC_Template-main`. Les fichiers `exemple.php` de chaque chapitre utilisent les contrats ou classes réels du projet. Quand une base de données n'est pas nécessaire à la démonstration, un adaptateur en mémoire est utilisé.

## Environnement

- PHP 8.x en ligne de commande
- Projet MVC sans framework ni autoload Composer
- L'exécution des exemples pédagogiques ne demande pas MySQL
- Les appels HTTP réels à l'API demandent le schéma MySQL et une connexion configurée dans `backend/config/Database.php`

## Quick Start

Depuis `lab-solid/Lab` :

```powershell
php -v
php .\hello-world.php
php .\SRP\exemple.php
```

Le premier script affiche `Bonjour SOLID !`; l'exemple SRP sérialise une entité `Discipline` réelle, sans créer de connexion PDO.

## Parcours et tutoriels

| Principe | Définition | Exemple appliqué | Comparaison | Tutoriel des changements |
| --- | --- | --- | --- | --- |
| SRP | Une responsabilité cohérente par module | [exemple.php](SRP/exemple.php) | [exemple-violation.php](SRP/exemple-violation.php) | [tutoriel.md](SRP/tutoriel.md) |
| OCP | Ajouter une variante par extension | [exemple.php](OCP/exemple.php) | [exemple-violation.php](OCP/exemple-violation.php) | [tutoriel.md](OCP/tutoriel.md) |
| LSP | Remplacer une implémentation sans casser le contrat | [exemple.php](LSP/exemple.php) | [exemple-violation.php](LSP/exemple-violation.php) | [tutoriel.md](LSP/tutoriel.md) |
| ISP | Dépendre seulement des opérations requises | [exemple.php](ISP/exemple.php) | [exemple-violation.php](ISP/exemple-violation.php) | [tutoriel.md](ISP/tutoriel.md) |
| DIP | Injecter des abstractions au point de composition | [exemple.php](DIP/exemple.php) | [exemple-violation.php](DIP/exemple-violation.php) | [tutoriel.md](DIP/tutoriel.md) |

Exécuter les exemples appliqués depuis `Lab` :

```powershell
php .\SRP\exemple.php
php .\OCP\exemple.php
php .\LSP\exemple.php
php .\ISP\exemple.php
php .\DIP\exemple.php
```

Les exemples `exemple-violation.php` sont de petits scénarios comparatifs; les versions LSP et ISP produisent volontairement une exception.

## Changements dans le projet

Les modifications réelles sont dans [`../MVC_Template-main`](../MVC_Template-main/README.md). Les tutoriels décrivent les fichiers modifiés et leurs effets. Les formats JSON GET et POST restent documentés dans le README de l'application.

## Point de départ pour présentation

La présentation est dans [`../presentation.md`](../presentation.md). Le problème vécu personnellement reste à compléter par l'apprenant; les observations d'architecture dans le code sont décrites comme telles.
