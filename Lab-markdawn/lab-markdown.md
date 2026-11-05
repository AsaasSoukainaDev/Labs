---
marp: true
theme: default
size: 16:9
paginate: true
header: "LAB MARKDOWN"
footer: "Documentation & présentation"
style: |
  section {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: #172033;
    font-family: "Segoe UI", "Inter", system-ui, sans-serif;
    padding: 48px 62px;
  }

  section.title {
    background: linear-gradient(135deg, #0b1f3a 0%, #123d6d 55%, #0f4c81 100%);
    color: #ffffff;
    text-align: center;
  }

  section.light {
    background: linear-gradient(135deg, #ffffff 0%, #edf4fb 100%);
  }

  h1 {
    color: #123d6d;
    font-size: 1.8em;
    letter-spacing: -0.02em;
    border-bottom: 3px solid #2563a6;
    padding-bottom: 12px;
  }

  section.title h1 {
    color: #ffffff;
    border-bottom: 0;
    font-size: 2.35em;
    margin-bottom: 22px;
  }

  h2 {
    color: #123d6d;
    font-size: 1.35em;
  }

  h3 {
    color: #0f4c81;
    font-size: 1.05em;
  }

  strong {
    color: #123d6d;
  }

  section.title strong {
    color: #dbeafe;
  }

  a {
    color: #0f4c81;
  }

  ul, ol {
    line-height: 1.42;
  }

  li {
    margin: 0.22em 0;
  }

  blockquote {
    background: rgba(18, 61, 109, 0.10);
    border-left: 6px solid #123d6d;
    border-radius: 8px;
    color: #0b1f3a;
    padding: 14px 18px;
  }

  code {
    background: #123d6d;
    color: #ffffff;
    border-radius: 5px;
    padding: 2px 5px;
  }

  pre {
    background: #0b1f3a;
    border-radius: 12px;
    box-shadow: 0 10px 24px rgba(11, 31, 58, 0.22);
    padding: 16px;
  }

  pre code {
    background: transparent;
    color: #f8fafc;
  }

  table {
    border-collapse: collapse;
    margin: 12px 0;
    width: 100%;
  }

  th {
    background: #123d6d;
    color: #ffffff;
  }

  th, td {
    border: 1px solid #6b93b8;
    padding: 8px 10px;
  }

  tr:nth-child(even) {
    background: rgba(219, 234, 254, 0.70);
  }

  header {
    color: #123d6d;
    font-size: 0.55em;
    font-weight: 700;
    letter-spacing: 0.12em;
  }

  footer {
    color: #475569;
    font-size: 0.5em;
  }

  section::after {
    color: #475569;
    font-size: 0.55em;
  }
---

<!-- _class: title -->

# Lab Markdown

**Étudiant :** Asaas soukayna  
**Encadrant :** ES-SARRAJ Fouad

---

<!-- _class: light -->

## Plan de Présentation

1. Introduction & Stack Technique
2. Définitions
3. Problème
4. Solution

---

## Stack Technique

**Stack de Développement Web Full-Stack**

- **Laravel** : Framework PHP backend pour API REST et logique métier
- **Alpine.js** : Framework JavaScript léger pour l'interactivité frontend
- **Tailwind CSS & Preline UI** : Framework CSS utilitaire et bibliothèque de composants
- **MySQL** : Base de données relationnelle pour gérer les données
- **Composer** : Gestionnaire de dépendances PHP

---

<!-- _class: light -->

## Définitions

### Markdown
Langage de balisage léger créé en 2004, utilisant une syntaxe simple (`#`, `**`, `-`) pour formater du texte. Converti en HTML, il est utilisé pour README, documentation technique et blogs.

### Balisage (Markup)
Système de notation qui structure le contenu avec des symboles spéciaux. Contrairement au HTML (`<h1>Titre</h1>`), Markdown simplifie avec `# Titre`.

---

## Définitions (suite)

### Syntaxe
Ensemble de règles qui définissent comment écrire correctement dans un langage. En Markdown : `**gras**` pour **gras**, `*italique*` pour *italique*.

### Rendu (Rendering)
Processus de transformation du code source (Markdown) en format visuel final (HTML/PDF). Le rendu interprète `# Titre` et l'affiche comme un grand titre.

---

<!-- _class: light -->

## Problème

**Nous devons créer un document Markdown pour présenter notre projet technique, mais nous ne savons pas utiliser tous les éléments Markdown.**

### Conséquences sans maîtrise du Markdown :

- **Présentation de projet incomplète** : Impossibilité de structurer correctement le sujet et les objectifs
- **Documentation non professionnelle** : Manque de mise en forme (gras, italique, tableaux)
- **Difficulté à intégrer du code** : Pas de coloration syntaxique dans les blocs de code
- **Collaboration difficile** : Impossibilité de versionner efficacement la documentation avec Git

---

## Solution

**Apprendre à utiliser tous les éléments Markdown en créant une présentation du projet "Gestion des Restaurants"**

### Travail à réaliser :

Créer un document Markdown (`presentation-gestion-restaurants.md`) contenant **2 slides** :

1. **Slide 1 : Sujet du Projet** — Présenter le sujet avec tous les éléments Markdown
2. **Slide 2 : Objectif du Projet** — Expliquer les objectifs avec tous les éléments Markdown

**Livrable :** Un document simple prêt à être versionné et partagé.

---

<!-- _class: light -->

## Solution — Document à Créer

### Fichier : `presentation-gestion-restaurants.md`

Ce document contiendra 2 slides simples utilisant **tous les éléments Markdown** requis :

✅ Titres et paragraphes  
✅ Texte en gras, italique et barré  
✅ Listes à puces et numérotées  
✅ Listes de tâches  
✅ Liens et images  
✅ Tableaux  
✅ Code et blocs de code  
✅ Citations  
✅ Lignes horizontales

---

## Slide 1 — Sujet du Projet

```markdown
# Slide 1 — Sujet du Projet

Mon projet est une **plateforme de gestion des restaurants** où les gérants 
peuvent gérer les menus, les réservations et les commandes. C'est *personnel* 
— pas ~~juste une copie~~ des solutions existantes.

### Fonctionnalités principales :
- Gestion des menus et plats
- Système de réservations en ligne
- Prise de commande digitale

![Interface de gestion](./screenshots/dashboard.png)

> "La gestion de restaurant devrait être simple et digitale."

---
```

---

<!-- _class: light -->

## Slide 2 — Objectif du Projet

```markdown
# Slide 2 — Objectif du Projet

L'objectif est de simplifier la gestion quotidienne des restaurants, tout 
en apprenant Markdown avec cette présentation. 
Voir le [Guide Markdown](https://www.markdownguide.org/).

### Étapes du projet :
1. Développer le module de gestion des menus
2. Créer le système de réservations
3. Implémenter la prise de commande

### Progression actuelle :
- [x] Module de gestion des catégories
- [x] API REST des plats
- [ ] Interface de réservation
- [ ] Écran cuisine

| Fonctionnalité | Technologies |
|:---------------|:-------------|
| Backend | Laravel + MySQL |
| Frontend | Alpine.js + Tailwind |

### Stack technique :
Configuration Laravel : `composer.json`

```json
{
  "require": {
    "laravel/framework": "^10.0",
    "laravel/sanctum": "^3.0"
  }
}
```
```

---

## Explication des Éléments Utilisés

### Slide 1 — Sujet du Projet
- **Titre H1** : `# Slide 1 — Sujet du Projet`
- **Gras** : `**plateforme de gestion des restaurants**`
- **Italique** : `*personnel*`
- **Barré** : `~~juste une copie~~`
- **Titre H3** : `### Fonctionnalités principales :`
- **Liste à puces** : `- Gestion des menus...`
- **Image** : `![Interface de gestion](./screenshots/dashboard.png)`
- **Citation** : `> "La gestion de restaurant..."`
- **Ligne horizontale** : `---`

---

<!-- _class: light -->

## Explication des Éléments Utilisés (suite)

### Slide 2 — Objectif du Projet
- **Titre H1** : `# Slide 2 — Objectif du Projet`
- **Lien** : `[Guide Markdown](https://www.markdownguide.org/)`
- **Titre H3** : `### Étapes du projet :`
- **Liste numérotée** : `1. Développer le module...`
- **Liste de tâches** : `- [x] Module de gestion...`
- **Tableau** : Structure avec `|` et alignement `:---`
- **Code inline** : `` `composer.json` ``
````
This is the description of what the code block changes:
<changeDescription>
Renforcer les couleurs des éléments Markdown et tableaux sur les slides 9 et 10.
</changeDescription>

This is the code block that represents the suggested code change:
```markdown
blockquote {
    background: rgba(18, 61, 109, 0.10);
    border-left: 6px solid #123d6d;
    border-radius: 8px;
    color: #0b1f3a;
    padding: 14px 18px;
  }

  code {
    background: #123d6d;
    color: #ffffff;
    border-radius: 5px;
    padding: 2px 5px;
  }

  pre {
    background: #0b1f3a;
    border-radius: 12px;
    box-shadow: 0 10px 24px rgba(11, 31, 58, 0.22);
    padding: 16px;
  }

  pre code {
    background: transparent;
    color: #f8fafc;
  }

  table {
    border-collapse: collapse;
    margin: 12px 0;
    width: 100%;
  }

  th {
    background: #123d6d;
    color: #ffffff;
  }

  th, td {
    border: 1px solid #6b93b8;
    padding: 8px 10px;
  }

  tr:nth-child(even) {
    background: rgba(219, 234, 254, 0.70);
  }

  header {
    color: #123d6d;
    font-size: 0.55em;
    font-weight: 700;
    letter-spacing: 0.12em;
  }

  footer {
    color: #475569;
    font-size: 0.5em;
  }

  section::after {
    color: #475569;
    font-size: 0.55em;
  }
```
