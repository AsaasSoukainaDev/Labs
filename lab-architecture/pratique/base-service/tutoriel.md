# Tutoriel : BaseService

## Objectif

Partager une opération commune entre plusieurs services sans la recopier.

## Explication pas à pas

1. `ArchitectureBaseService` fournit `texteObligatoire()`, qui retire les espaces et refuse une valeur vide.
2. `BaseArticleService` hérite de cette classe et réutilise la méthode pour valider un titre.
3. `BaseCommentaireService` réutilise la même méthode pour valider un texte de commentaire.
4. Les deux services gardent leurs méthodes publiques propres à leur responsabilité.
5. Le script appelle les deux services et affiche les valeurs validées.

## Exécuter

Depuis `lab-architecture/pratique` :

```powershell
php .\base-service\exemple.php
```

Résultat attendu :

```text
Article : BaseService partagee
Commentaire : Validation commune
```

## Lien avec l'architecture

Une classe de base peut factoriser un traitement réellement commun à plusieurs services. Dans une application, elle doit rester ciblée et ne pas devenir un fourre-tout. Cet exemple est autonome.

## Exercice

Essaie une valeur vide et observe l'exception levée par la méthode partagée.