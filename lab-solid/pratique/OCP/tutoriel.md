# OCP — Ouvert à l'extension, fermé à la modification

## Objectif

Ajouter ou combiner des règles de validation sans modifier un validateur qui contient déjà toutes les conditions.

## Fichiers concernés


- Lanceur : [`exemple.php`](exemple.php)
- Contexte : le libellé est soumis à une longueur minimale, une limite de base de données et une règle de contenu.

## Parcours de l'exemple

1. Le namespace `Solid\Ocp` et les classes du principe sont déclarés directement dans `exemple.php`; le fichier peut être lancé seul.
2. `ValidateurAvant` illustre le cas initial : la règle des quatre caractères est directement écrite dans `valider()`. Ajouter d'autres règles pousse à modifier cette classe.
3. `ValidateurLibelle` reçoit un tableau d'objets qui suivent `RegleValidation`.
4. `LongueurMinimale(4)`, `LongueurMaximale(50)` et `SansChiffres` représentent chacune une règle indépendante. La limite de 50 correspond au `VARCHAR(50)` du schéma de référence.
5. La boucle essaie trois libellés. `Yoga` passe; la chaîne de 51 caractères échoue sur la longueur maximale; `Cardio2` échoue à cause du chiffre.
6. Chaque règle peut être ajoutée ou retirée au point de composition sans modifier `ValidateurLibelle`.

## Exécuter

Depuis `lab-solid/pratique` :

```powershell
php .\OCP\exemple.php
```

La sortie indique une acceptation pour `Yoga` et un message de refus pour chacun des deux autres cas.

## Lien avec le projet et limite

Le projet valide le libellé d'une discipline. Ici, les règles et les noms sont ceux du fichier `src`; le code s'exécute sans base. La composition doit rester adaptée aux règles réellement demandées par l'application.

## Mini-exercice

Ajoutez `SansEspaces` comme nouvelle classe qui implémente `RegleValidation`, puis activez-la dans le tableau de règles sans modifier `ValidateurLibelle`.
