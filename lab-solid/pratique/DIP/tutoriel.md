# DIP — Inversion des dépendances

## Objectif

Comparer un service qui construit un DAO concret à un service qui reçoit un dépôt conforme à une abstraction.

## Fichiers concernés

- Exemple autonome : [`exemple.php`](exemple.php), contenant directement les interfaces, classes et méthodes nécessaires à la démonstration.
- Aucun serveur MySQL n'est requis.

## Parcours de l'exemple

1. La déclaration `namespace Solid\Dip` situe les classes. `use` importe les exceptions et le type PDO. Toutes les classes requises sont définies dans ce fichier : aucun `require_once` ni autoload n'est nécessaire.
2. `DisciplineDAOConcretAvant` simule un accès qui échoue. `DisciplineServiceAvant` le construit dans son constructeur, ce qui lie directement le service à cette classe concrète. La démonstration intercepte l'erreur pour continuer.
3. `DisciplineRepositoryInterface` définit les opérations de lecture et d'ajout dont le service a besoin, sans choisir le stockage.
4. `DisciplineRepositoryMemoire` implémente ce contrat avec un tableau PHP. `DisciplineRepositoryPdo` montre l'adaptateur PDO de production; il reçoit une connexion existante et n'est pas instancié pendant la démonstration.
5. `DisciplineService` reçoit l'interface dans son constructeur. `ajouterDiscipline()` valide le libellé, transmet l'ajout au dépôt et renvoie un tableau de résultat. `listerDisciplines()` lit le dépôt et normalise l'identifiant.
6. Le point d'entrée crée `DisciplineRepositoryMemoire`, puis l'injecte au service. L'ajout de Musculation réussit et la liste contient la ligne ajoutée.

## Exécuter

Depuis `lab-solid/pratique` :

```powershell
php .\DIP\exemple.php
```

La sortie affiche l'échec simulé de l'ancienne conception, puis le JSON de succès et la liste issue du dépôt mémoire.

## Lien avec le projet et limite

Le service dépend d'un contrat plutôt que du stockage concret. Le fichier reprend localement les classes utiles de `src/5_dip.php` pour rester autonome; si la source change, il faudra synchroniser cette copie. La source pédagogique utilise une interface unique pour les deux opérations, tandis que le module MVC réel séparait ses interfaces de lecture et d'écriture. L'adaptateur PDO n'est pas testé contre MySQL dans cet exercice.

## Mini-exercice

Modifiez `DisciplineRepositoryMemoire` pour qu'il commence avec Yoga, puis injectez-le au service. Vérifiez que la méthode de liste ne dépend pas de la façon dont les données sont stockées.
