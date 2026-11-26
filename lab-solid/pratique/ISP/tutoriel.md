# ISP — Ségrégation des interfaces

## Objectif

Séparer les contrats de lecture et d'écriture afin qu'un client n'ait pas à dépendre d'opérations qu'il ne peut pas utiliser.

## Fichiers concernés

- Lanceur : [`exemple.php`](exemple.php)
- Cas d'usage : consulter la liste (GET) et ajouter (POST) des disciplines.

## Parcours de l'exemple

1. Les contrats et classes du namespace `Solid\Isp` sont définis directement dans `exemple.php`; il s'exécute sans charger un autre fichier.
2. `DisciplineDAOComplet` regroupe lecture, ajout, modification et suppression.
3. `DisciplineLectureSeuleAvant` ne sait que lire; elle doit quand même déclarer les trois autres méthodes et les refuser à l'exécution.
4. `DisciplineLecteur` et `DisciplineEcrivain` séparent les deux capacités réellement utilisées dans ce lab.
5. `DisciplineDAOMemoire` implémente les deux interfaces parce que cette classe de démonstration peut lire et écrire.
6. `AjoutDisciplineService` reçoit uniquement `DisciplineEcrivain`; il valide le libellé puis demande l'ajout.
7. `ListeDisciplinesService` reçoit uniquement `DisciplineLecteur` et transforme les lignes pour le résultat de lecture.
8. Le lanceur partage le DAO mémoire entre les deux services pour illustrer un cas POST suivi d'un GET.

## Exécuter

Depuis `lab-solid/pratique` :

```powershell
php .\ISP\exemple.php
```

La sortie affiche le refus de l'opération d'écriture de l'exemple avant, puis une confirmation JSON et la liste contenant Cardio.

## Lien avec le projet et limite

La séparation correspond aux besoins distincts de lecture et d'écriture du module Discipline. Le lanceur ne démarre pas le contrôleur HTTP et utilise un DAO mémoire.

## Mini-exercice

Ajoutez un client qui peut supprimer une discipline. Choisissez si cette opération appartient à `DisciplineEcrivain` ou mérite une interface dédiée, puis justifiez le choix selon les clients.
