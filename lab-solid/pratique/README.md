# Pratique SOLID avec PHP

Cette pratique reprend les cinq sources de `lab-solid/src/`. Chaque dossier contient un `exemple.php` autonome et un tutoriel pas à pas. Chaque exemple recopie le code du principe depuis `src/`, puis ajoute une démonstration exécutable; aucun ne nécessite `require_once`. Si une source évolue, reportez la modification dans sa copie pratique.

Les dépôts mémoire sont des simulations pédagogiques. Ils n'écrivent pas dans MySQL et ne sont pas des appels à l'application web.

## Environnement

- PHP 8.x en ligne de commande
- Extension `mbstring` pour les validations de libellé
- Aucun framework, Composer ou serveur MySQL requis

## Quick Start

Depuis `lab-solid/pratique` :

```powershell
php -v
php .\hello-world.php
php .\SRP\exemple.php
```

Le Hello World affiche `Bonjour SOLID !`. L'exercice SRP affiche les réponses JSON produites par les deux conceptions.

## Parcours

| Principe | Source étudiée | Exemple exécutable | Tutoriel |
| --- | --- | --- | --- |
| SRP — Responsabilité unique | [`src/1_srp.php`](../src/1_srp.php) | [`SRP/exemple.php`](SRP/exemple.php) | [`SRP/tutoriel.md`](SRP/tutoriel.md) |
| OCP — Ouvert/fermé | [`src/2_ocp.php`](../src/2_ocp.php) | [`OCP/exemple.php`](OCP/exemple.php) | [`OCP/tutoriel.md`](OCP/tutoriel.md) |
| LSP — Substitution de Liskov | [`src/3_lsp.php`](../src/3_lsp.php) | [`LSP/exemple.php`](LSP/exemple.php) | [`LSP/tutoriel.md`](LSP/tutoriel.md) |
| ISP — Ségrégation des interfaces | [`src/4_isp.php`](../src/4_isp.php) | [`ISP/exemple.php`](ISP/exemple.php) | [`ISP/tutoriel.md`](ISP/tutoriel.md) |
| DIP — Inversion des dépendances | [`src/5_dip.php`](../src/5_dip.php) | [`DIP/exemple.php`](DIP/exemple.php) | [`DIP/tutoriel.md`](DIP/tutoriel.md) |

Lancer les cinq parcours, toujours depuis `pratique` :

```powershell
php .\SRP\exemple.php
php .\OCP\exemple.php
php .\LSP\exemple.php
php .\ISP\exemple.php
php .\DIP\exemple.php
```

## Relation avec le projet

Les sources s'inspirent de la gestion des disciplines : libellé minimal de quatre caractères, stockage et lecture de disciplines, réponses de type JSON, contrats de dépôt et validation. Les classes de ces exemples sont définies dans le namespace `Solid\...` et utilisent des dépôts mémoire. Elles illustrent l'architecture du projet, mais ne se connectent pas à une base et ne remplacent pas le code de production.

## Problème concret et solution

À compléter par l'apprenant à partir de son expérience réelle :

- **Problème rencontré :** [décrire le comportement et les étapes pour le reproduire]
- **Solution proposée :** [décrire le changement et la façon de le vérifier]
