# Tutoriel : traits

## Objectif

Partager le comportement d'horodatage entre deux classes de contenu sans recopier les mêmes propriétés et méthodes.

## Lire l'exemple

Dans [`exemple.php`](exemple.php), le trait `HasTimestamps` définit les dates de création et de mise à jour, ainsi que leur initialisation et leur lecture. Les classes `Article` et `Commentaire` réutilisent ce comportement avec `use HasTimestamps`.

Le trait est pertinent ici parce que les deux classes ont besoin des mêmes opérations, sans représenter le même type d'objet. Il ne remplace ni l'héritage ni un service métier.

## Exécuter

Depuis le dossier `pratique` :

```powershell
php .\traits\exemple.php
```

Résultat attendu : deux lignes affichant le titre de l'article et le commentaire, chacun suivi de sa date de création. L'heure dépend du moment d'exécution.

## À retenir

- Un trait compose des méthodes et des propriétés dans une classe au moment de sa définition.
- Il peut réduire la duplication d'un comportement transversal partagé par plusieurs classes.
- Dans Laravel, Eloquent fournit déjà des horodatages aux modèles configurés pour cela; cet exercice illustre la syntaxe PHP et n'est pas une modification du modèle Laravel.

## Pour aller plus loin

Ajoute une méthode au trait qui met à jour `updatedAt`, puis appelle-la après une modification simulée.