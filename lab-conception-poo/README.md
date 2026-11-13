# lab-conception-poo

## 1. Besoin du projet technique

Ce lab a pour objectif de comprendre la **conception orientée objet (POO)** et son utilisation dans le développement d'applications.

La conception POO consiste à analyser un problème, identifier les objets nécessaires, définir leurs responsabilités et leurs relations, puis organiser le code pour obtenir une application claire, réutilisable et facile à maintenir.

Avant de commencer le développement, il est important de comprendre :

- Pourquoi utiliser la programmation orientée objet ?
- Comment passer d'un besoin réel à une conception orientée objet ?
- Comment identifier les classes, les attributs et les méthodes ?
- Comment organiser les classes et définir leurs relations ?
- Comment choisir entre héritage et composition ?
- Comment appliquer les bonnes pratiques pour éviter un code complexe et difficile à maintenir ?

### Projet technique

Pour mettre en pratique les notions étudiées, le lab consiste à concevoir et réaliser une application web de gestion de salle de sport.

L'application permettra principalement :

- D'ajouter des disciplines sportives.
- De lister les disciplines enregistrées.

**Technologies utilisées :**

- PHP : programmation orientée objet.
- Tailwind CSS : création d'une interface responsive.
- UML : représentation et conception des classes et de leurs relations.

L'objectif n'est pas de développer un système complet de gestion de salle de sport, mais d'utiliser ce projet comme support pratique pour comprendre et appliquer les principes de conception POO.

### Problématique du projet

Comment analyser le besoin d'une application de gestion de salle de sport et concevoir une structure orientée objet en PHP qui soit claire, organisée, réutilisable et facile à maintenir ?

## 2. Notions et techniques à apprendre

### 2.1. Introduction à la POO

Comprendre les bases de la programmation orientée objet :

- Qu'est-ce que la programmation orientée objet ?
- Pourquoi utiliser cette approche ?
- Quelle est la différence entre la programmation procédurale et la POO ?
- Quels sont les avantages et les limites de la POO ?

### 2.2. Concepts fondamentaux de la POO

Expliquer chaque concept avec une définition simple, son rôle, son utilité et un exemple de code PHP :

- **Classe et objet** : comprendre la différence entre un modèle et une instance.
- **Attribut et méthode** : représenter les données et les comportements d'un objet.
- **Constructeur** : initialiser un objet lors de sa création.
- **Encapsulation** : protéger les données et contrôler leur accès.
- **Héritage** : réutiliser les propriétés et les méthodes d'une autre classe.
- **Polymorphisme** : utiliser une même méthode avec différents comportements.
- **Abstraction** : définir les caractéristiques communes sans imposer tous les détails.
- **Interface** : définir un contrat que les classes doivent respecter.

### 2.3. Principes et bonnes pratiques de conception POO

Expliquer les principes permettant de concevoir des classes propres et bien organisées :

- **Responsabilité unique (SRP)** : donner une seule responsabilité principale à chaque classe.
- **Faible couplage et forte cohésion** : limiter les dépendances entre les classes et regrouper les éléments qui travaillent ensemble.
- **Composition et héritage** : comprendre les différences et savoir quand utiliser chaque approche.
- **Principe SOLID** : présenter et illustrer les cinq principes :
  - SRP : Single Responsibility Principle.
  - OCP : Open/Closed Principle.
  - LSP : Liskov Substitution Principle.
  - ISP : Interface Segregation Principle.
  - DIP : Dependency Inversion Principle.
- **Relations entre les classes** : comprendre l'association, l'agrégation et la composition.

Pour chaque principe, présenter sa définition, son intérêt, un exemple de mauvaise conception, une solution améliorée et un exemple PHP.

### 2.4. UML et conception

Comprendre comment représenter une conception orientée objet avant de développer :

- Qu'est-ce que UML et pourquoi l'utiliser ?
- Qu'est-ce qu'un diagramme de classes ?
- Comment représenter les classes, les attributs et les méthodes ?
- Comment représenter les relations entre les classes ?
- Comment représenter les multiplicités et les visibilités ?
- Comment passer d'une analyse du besoin à un diagramme UML ?

Présenter un exemple de diagramme de classes et expliquer chaque élément.

### 2.5. Bonnes pratiques et erreurs à éviter

Étudier les erreurs fréquentes lors de la conception POO :

- Créer des classes qui ont trop de responsabilités.
- Répéter le même code dans plusieurs classes.
- Utiliser l'héritage sans réelle nécessité.
- Créer trop de dépendances entre les classes.
- Mélanger les responsabilités métier et l'affichage.
- Négliger l'encapsulation et la protection des données.

Expliquer comment éviter ces erreurs à travers des exemples.

## 3. Réalisation attendue

### 3.1. Recherche et compréhension

1. Rechercher les concepts fondamentaux et les principes de conception POO.
2. Expliquer chaque notion avec des mots simples et des exemples concrets.
3. Comparer les différentes approches de conception.
4. Présenter des exemples PHP pour illustrer les concepts.
5. Utiliser des sources fiables : documentation officielle, livres et articles techniques. Ajouter les liens des références utilisées.

### 3.2. Analyse et conception du projet

À partir du besoin de l'application de gestion de salle de sport :

1. Analyser les fonctionnalités demandées.
2. Identifier les objets et les classes nécessaires.
3. Définir les attributs et les méthodes de chaque classe.
4. Déterminer les responsabilités de chaque classe.
5. Identifier les relations entre les classes.
6. Réaliser un diagramme UML représentant la conception de l'application.
7. Justifier les choix de conception avec les principes POO étudiés.

### 3.3. Développement pratique

1. Développer l'application en PHP en utilisant la programmation orientée objet.
2. Appliquer les notions et les principes de conception étudiés.
3. Organiser le code dans des classes ayant des responsabilités claires.
4. Créer une interface responsive avec Tailwind CSS.
5. Implémenter l'ajout et l'affichage des disciplines sportives.
6. Vérifier que la structure du code respecte les choix de conception réalisés.

### 3.4. Tests et vérification

- Vérifier le fonctionnement de l'ajout des disciplines.
- Vérifier l'affichage de la liste des disciplines.
- Tester les différentes classes et leurs méthodes.
- Vérifier les relations et les interactions entre les classes.
- Contrôler la qualité et l'organisation du code.

### 3.5. Présentation des résultats

Présenter dans `presentation.md`, au format Marp :

- Les concepts fondamentaux de la POO.
- Les principes et les bonnes pratiques de conception.
- Les exemples de code et leurs explications.
- Le diagramme UML du projet.
- Les choix de conception réalisés.
- Les résultats des tests et de l'application.

**Consignes générales :**

- Utiliser un français simple et facile à comprendre (niveau A2-B1).
- Expliquer chaque notion avec une définition, son rôle, son utilité et un exemple concret.
- Privilégier la compréhension de la conception avant l'écriture du code.
- Utiliser PHP pour les exemples pratiques.
- Utiliser le projet de gestion de salle de sport comme fil conducteur.
- Éviter les exemples trop complexes et les fonctionnalités qui ne sont pas demandées.
- Ne pas développer une application complète de gestion de salle de sport.
