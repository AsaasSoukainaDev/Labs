# Tutoriel : traits

## Objectif

Partager le comportement d'horodatage entre deux classes de contenu sans recopier les mêmes propriétés et méthodes.

## Explication pas à pas

Ouvre [`exemple.php`](exemple.php) et examine les blocs dans l'ordre :

1. `trait HasTimestamps` déclare deux propriétés de type `DateTimeImmutable`, qui contiendront les dates de création et de mise à jour.
2. `initialiserHorodatages()` accepte une date optionnelle. L'opérateur `??=` crée la date actuelle si aucune date n'a été fournie, puis initialise les deux propriétés avec le même moment.
3. `dateCreation()` et `dateMiseAJour()` renvoient ces dates. Ces accesseurs permettent de les lire sans rendre les propriétés accessibles directement.
4. `Article` et `Commentaire` incluent le trait avec `use HasTimestamps`. Chacune appelle `initialiserHorodatages()` dans son constructeur, donc chaque nouvel objet reçoit ses dates.
5. Le script crée un article et un commentaire, puis appelle `dateCreation()` sur chacun. `format('Y-m-d H:i:s')` transforme la date en texte avant l'affichage.

Le trait est pertinent ici parce que les deux classes ont besoin des mêmes opérations, sans représenter le même type d'objet. Il ne remplace ni l'héritage ni un service métier.

## Exécuter

Depuis le dossier `pratique` :

```powershell
php .\traits\exemple.php
```

Résultat attendu : deux lignes affichant le titre de l'article et le commentaire, chacun suivi de sa date de création. L'heure dépend du moment d'exécution.

Les deux dates sont créées au lancement du programme; elles seront donc proches, mais peuvent différer légèrement.

## À retenir

- Un trait compose des méthodes et des propriétés dans une classe au moment de sa définition.
- Il peut réduire la duplication d'un comportement transversal partagé par plusieurs classes.
- Dans Laravel, Eloquent fournit déjà des horodatages aux modèles configurés pour cela; cet exercice illustre la syntaxe PHP et n'est pas une modification du modèle Laravel.

## Pour aller plus loin

Ajoute une méthode au trait qui met à jour `updatedAt`, puis appelle-la après une modification simulée.