# Tutoriel : interfaces

## Objectif

Définir un contrat de publication que différentes classes peuvent implémenter.

## Explication pas à pas

1. `Publiable` déclare la méthode `publier()` sans en fournir l'implémentation.
2. `Article` implémente cette interface et doit donc définir `publier()`.
3. `publierContenu()` accepte tout objet de type `Publiable`, sans dépendre directement de la classe `Article`.
4. Le script transmet un article à cette fonction, qui affiche le résultat de la publication.

## Exécuter

Depuis `lab-poo/pratique` :

```powershell
php .\interfaces\exemple.php
```

Résultat attendu :

```text
Article publie : Les interfaces
```

## Lien avec le projet

Un contrat permet à une couche métier de dépendre d'un comportement plutôt que d'une classe précise. Cet exemple est autonome et n'est pas intégré au projet Laravel.

## Exercice

Crée une autre classe qui implémente `Publiable` et vérifie qu'elle peut être transmise à `publierContenu()`.