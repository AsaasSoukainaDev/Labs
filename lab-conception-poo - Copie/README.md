# lab-conception-poo

## 1. Besoin du projet technique

Ce lab a pour objectif d'apprendre la **conception orientée objet (POO)** et de comprendre comment concevoir une application avant de commencer son développement.

Les bases de la POO en PHP étant déjà acquises, le travail porte sur la manière d'utiliser ces connaissances pour construire une application bien organisée, facile à comprendre, à maintenir et à faire évoluer.

La conception orientée objet consiste à analyser un besoin, identifier les classes nécessaires, définir leurs responsabilités, organiser leurs relations et représenter la structure de l'application avant de passer à l'implémentation.

L'objectif est d'apprendre une véritable démarche de conception, depuis l'analyse du besoin jusqu'à la réalisation du code.

### Projet technique

Pour mettre en pratique les notions étudiées, le lab consiste à concevoir et développer une application web de gestion de salle de sport.

L'application permettra principalement :

- **Ajouter une discipline** : permettre d'enregistrer une nouvelle discipline sportive.
- **Lister les disciplines** : afficher les disciplines enregistrées.

**Technologies utilisées :**

- **PHP** : implémentation de la conception orientée objet.
- **Tailwind CSS** : création d'une interface responsive.
- **UML** : modélisation des classes et de leurs relations.

Le projet sert de support pratique pour apprendre à analyser un besoin, construire une conception orientée objet et la transformer en une application fonctionnelle.

## 2. Notions et techniques à apprendre

### 2.1. Introduction à la conception orientée objet

Comprendre les principes de la conception POO :

- Qu'est-ce que la conception orientée objet ?
- Quelle est la différence entre programmation orientée objet et conception orientée objet ?
- Pourquoi faut-il concevoir une application avant de commencer à coder ?
- Quels sont les objectifs d'une bonne conception ?
- Quelles sont les caractéristiques d'une application bien conçue ?

### 2.2. Démarche de conception d'une application

Apprendre les étapes nécessaires pour passer d'un besoin à une conception orientée objet :

- **Analyse du besoin** : comprendre le problème, les objectifs et les fonctionnalités attendues.
- **Identification des objets et des classes** : repérer les éléments importants du domaine et déterminer les classes nécessaires.
- **Définition des responsabilités** : déterminer le rôle de chaque classe et éviter les responsabilités multiples.
- **Identification des attributs et des méthodes** : déterminer les données et les comportements nécessaires.
- **Identification des relations** : comprendre comment les classes collaborent entre elles.
- **Modélisation UML** : représenter graphiquement la structure de l'application.
- **Validation de la conception** : vérifier que la structure répond au besoin et reste simple à maintenir.
- **Passage au développement** : transformer la conception en code PHP.

Pour chaque étape, expliquer son objectif, comment la réaliser et donner un exemple concret.

### 2.3. Principes et bonnes pratiques de conception

Étudier les principes qui permettent de construire une application bien organisée :

- **Responsabilité unique (SRP)** : donner une responsabilité principale à chaque classe.
- **Faible couplage** : limiter les dépendances entre les classes.
- **Forte cohésion** : regrouper dans une classe les éléments qui travaillent ensemble.
- **Séparation des responsabilités** : séparer les traitements métier, l'accès aux données et la présentation.
- **Composition et héritage** : comprendre les différences et savoir quand utiliser chaque approche.

Pour chaque principe, présenter sa définition, son intérêt, un exemple de mauvaise conception et une solution améliorée en PHP.

### 2.4. Principes SOLID

Comprendre et appliquer les cinq principes SOLID :

- **SRP (Single Responsibility Principle)** : une classe doit avoir une seule responsabilité.
- **OCP (Open/Closed Principle)** : permettre d'ajouter des fonctionnalités sans modifier inutilement le code existant.
- **LSP (Liskov Substitution Principle)** : une classe dérivée doit pouvoir remplacer sa classe de base sans casser le fonctionnement.
- **ISP (Interface Segregation Principle)** : préférer plusieurs petites interfaces adaptées aux besoins.
- **DIP (Dependency Inversion Principle)** : faire dépendre la logique métier d'abstractions plutôt que de détails techniques.

Pour chaque principe, expliquer :
- Sa définition et son objectif.
- Le problème qu'il permet d'éviter.
- Un exemple de mauvaise conception.
- Une solution qui respecte le principe.
- Un exemple pratique en PHP.

### 2.5. Relations et organisation des classes

Comprendre comment organiser les relations entre les classes :

- **Association** : représenter une relation entre deux classes.
- **Agrégation** : représenter une relation entre des objets indépendants, dont l'un regroupe l'autre.
- **Composition** : représenter une relation forte entre un objet et ses composants.
- **Héritage et composition** : comparer les deux approches et comprendre leurs cas d'utilisation.

Présenter des exemples concrets et leur représentation UML.

### 2.6. UML et modélisation

Apprendre à utiliser UML pour représenter une conception avant le développement :

- Qu'est-ce que UML et pourquoi l'utiliser ?
- Quels sont les principaux diagrammes UML utiles à la conception ?
- Qu'est-ce qu'un diagramme de classes ?
- Comment identifier les classes à partir d'un besoin ?
- Comment représenter les attributs, les méthodes et les visibilités ?
- Comment représenter les relations entre les classes ?
- Comment représenter les multiplicités ?
- Comment passer d'une analyse du besoin à un diagramme de classes ?

Présenter la construction progressive d'un diagramme UML avec un exemple expliqué.

### 2.7. Erreurs et qualité de conception

Étudier les erreurs fréquentes lors de la conception d'une application :

- Créer des classes avec trop de responsabilités.
- Créer des dépendances excessives entre les classes.
- Utiliser l'héritage sans réelle nécessité.
- Répéter les mêmes traitements dans plusieurs classes.
- Mélanger les responsabilités métier et la présentation.
- Créer une architecture trop complexe pour un besoin simple.
- Avoir un diagramme UML qui ne correspond pas à l'implémentation.

Expliquer les conséquences de ces erreurs et présenter les solutions pour les éviter.

## 3. Réalisation attendue

### 3.1. Recherche et compréhension

1. Effectuer une recherche sur la conception orientée objet.
2. Comprendre les étapes nécessaires pour concevoir une application.
3. Étudier les principes de conception et les bonnes pratiques.
4. Expliquer chaque notion avec une définition simple, son rôle et des exemples concrets.
5. Présenter des exemples PHP pour illustrer les bonnes et les mauvaises pratiques.
6. Utiliser des sources fiables : documentation officielle, livres et articles techniques.
7. Ajouter les liens des références utilisées.

### 3.2. Analyse et conception du projet

À partir du besoin de l'application de gestion de salle de sport :

1. Analyser les fonctionnalités demandées.
2. Identifier les objets et les classes nécessaires.
3. Définir les responsabilités de chaque classe.
4. Déterminer les attributs et les méthodes.
5. Identifier les relations entre les classes.
6. Appliquer les principes de conception étudiés.
7. Réaliser un diagramme UML représentant la conception.
8. Expliquer et justifier les choix de conception réalisés.

### 3.3. Développement de l'application

1. Développer l'application en PHP en suivant la conception réalisée.
2. Organiser le code selon les responsabilités définies.
3. Appliquer les principes et les bonnes pratiques de conception POO.
4. Créer une interface responsive avec Tailwind CSS.
5. Implémenter l'ajout et l'affichage des disciplines sportives.
6. Vérifier la cohérence entre le diagramme UML et le code PHP.

### 3.4. Tests et vérification

- Tester l'ajout des disciplines.
- Tester l'affichage des disciplines.
- Vérifier les interactions entre les classes.
- Vérifier la séparation des responsabilités.
- Contrôler les dépendances entre les classes.
- Vérifier la cohérence entre la conception UML et l'implémentation PHP.
- Contrôler la qualité et la simplicité de la conception.

### 3.5. Présentation des résultats

Présenter dans `presentation.md`, au format Marp :

- La définition et les objectifs de la conception orientée objet.
- La différence entre programmation POO et conception POO.
- Les étapes de conception d'une application, expliquées progressivement.
- Les principes et les bonnes pratiques de conception.
- Les cinq principes SOLID avec leurs exemples.
- Les relations entre les classes.
- UML et la construction d'un diagramme de classes.
- L'analyse et la conception de l'application de gestion de salle de sport.
- La justification des choix de conception.
- Le passage du diagramme UML au code PHP.
- Les tests et les résultats de l'application.

**Consignes générales :**

- Utiliser un français simple et facile à comprendre (niveau A2-B1).
- Considérer que les bases de la POO en PHP sont déjà acquises.
- Ne pas refaire un cours d'initiation sur les classes, les objets et les constructeurs.
- Privilégier la compréhension de la démarche de conception avant l'écriture du code.
- Expliquer comment réaliser une conception et pas seulement donner des définitions.
- Utiliser des exemples progressifs en PHP.
- Utiliser le projet de gestion de salle de sport comme fil conducteur.
- Montrer les mauvaises pratiques avant de proposer les améliorations lorsque cela facilite la compréhension.
- Justifier les choix de conception.
- Ne pas ajouter de fonctionnalités qui ne sont pas demandées.
- Ne pas développer un système complet de gestion de salle de sport.