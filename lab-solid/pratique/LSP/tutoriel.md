# LSP — Substitution de Liskov

## Objectif

Observer une sous-classe qui casse la promesse de son parent, puis utiliser des implémentations qui respectent leurs contrats de stockage.

## Fichiers concernés

- Lanceur : [`exemple.php`](exemple.php)

## Parcours de l'exemple

1. Les classes de la source sont présentes dans `exemple.php` sous le namespace `Solid\Lsp`; le lanceur n'a pas de dépendance de fichier externe.
2. `DisciplineDAOAvant` promet que `ajouter()` retourne un booléen et que `afficherTous()` retourne les lignes.
3. `DisciplineArchiveAvant` hérite de cette classe, mais `ajouter()` lance une exception. `importerAvant()` s'attend pourtant à pouvoir ajouter; le lanceur intercepte l'échec pour poursuivre la démonstration.
4. La version corrigée définit `DisciplineStockage` comme contrat de lecture et d'écriture. `StockageMemoire` respecte les deux opérations.
5. `StockageJournalise` reçoit un autre `DisciplineStockage`, délègue les opérations et ajoute un journal. Il peut remplacer le stockage mémoire pour `importer()` tout en préservant ses garanties.
6. `importer()` enregistre Yoga et Cardio, puis le lanceur affiche le nombre, le journal et les données.
7. `ArchiveDisciplines` n'implémente que `DisciplineLecture`. Elle ne prétend pas pouvoir écrire; le code client d'archive la limite à la lecture.

## Exécuter

Depuis `lab-solid/pratique` :

```powershell
php .\LSP\exemple.php
```

La sortie montre l'exception intentionnelle de l'ancienne classe, puis deux disciplines importées avec le journal correspondant.

## Lien avec le projet et limite

L'exemple utilise la gestion de disciplines et illustre pourquoi un objet métier ne doit pas être un sous-type d'un DAO. Le stockage est en mémoire; les contrats de cet exemple sont pédagogiques et ne sont pas ceux de l'application MVC refactorisée.

## Mini-exercice

Créez `StockageLectureSeule` qui implémente uniquement `DisciplineLecture`. Vérifiez que la liste peut être lue sans exposer une méthode d'ajout qui échoue.
