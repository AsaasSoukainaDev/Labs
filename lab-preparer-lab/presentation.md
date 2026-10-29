---
marp: true
theme: default
size: 16:9
paginate: true
style: |
	section {
		background: #183b39;
		color: #f6f7f2;
		font-family: "Inter", system-ui, sans-serif;
		font-size: 25px;
		padding: 54px 70px;
	}

	h1,
	h2 {
		color: #ffd08a;
		font-weight: 700;
	}

	section.light {
		background: #ffffff;
		color: #1f2937;
	}

	section.light h1,
	section.light h2 {
		color: #2563eb;
	}

	code {
		background: #f3f4f6;
		color: #1f2937;
	}

	pre {
		background: #f9fafb;
		border: 1px solid #e5e7eb;
	}
---

<!-- _class: lead -->

# Méthodologie et planification d’un lab

---

<!-- _class: light -->

## Lab Plan

1. Introduction
2. Stack
3. Définition
4. Problématique
5. Solution
6. Pratique

---

## Introduction

Un plan commun aide chaque étudiant à préparer un lab clair et réalisable.

- Type : première pratique méthodologique.
- Objectif : transformer un besoin en parcours testable.
- Fil conducteur : un besoin concret de blog.

---

<!-- _class: light -->

## Stack

- **Parcours :** définition → outils → première pratique → Quick Start.
- **Choix :** une technologie adaptée au besoin.
- **Exemples :** Laravel, Markdown ou Alpine.js.

Marp for VS Code permet de prévisualiser le support.

---

## Définition

Un lab est un parcours guidé qui transforme un besoin en pratique vérifiable.

- **Stack :** technologies utilisées pour réaliser une fonction.
- **Problème :** besoin précis à résoudre.
- **Solution :** étapes et choix techniques proposés.

---

## Problématique

Chaque étudiant risque de commencer sans plan réutilisable pour cadrer son lab.

- Le besoin reste trop général.
- La technologie est choisie sans justification.
- Les étapes et critères de réussite manquent.

**Attendu :** un plan que chaque étudiant peut suivre et adapter.

---

<!-- _class: light -->

## Solution

1. Créer un dossier et les six fichiers standard.
2. Décrire le besoin et le résultat attendu.
3. Choisir une stack et ordonner les tâches.
4. Ajouter la pratique, les tests et livrables.

La technologie dépend du besoin, pas d’un choix universel.

---

<!-- _class: light -->

## Pratique — outils et vérification

1. Ouvrir le fichier Marp dans VS Code.
2. Installer l’extension **Marp for VS Code**.
3. Lancer `Marp: Open Preview`.

**Vérification :** les diapositives s’affichent dans l’ordre.

---

## Pratique — cadrage

**Besoin :** les lecteurs ne trouvent pas les articles par thème.

Compléter les quatre rubriques :

```text
Contexte | Problème | Technologie | Résultat attendu
```

---

<!-- _class: light -->

## Pratique — plan final du lab

| Étape | Livrable attendu |
| :--- | :--- |
| Définition | Besoin et vocabulaire |
| Outils | Environnement prêt |
| Hello World | Première preuve |
| Quick Start | Mini-réalisation |

---

## Pratique — Quick Start : dossier

```text
lab-sujet-nom/
├── README.md
├── 1-introduction.md
├── 2-definition.md
├── 3-practical.md
├── 4-presentation.md
└── PROMPT-CONTENU.md
```

---

<!-- _class: light -->

## Pratique — Quick Start : cadrer le besoin

1. Choisir une fonction de blog.
2. Écrire le problème en une phrase.
3. Définir un résultat observable.

---

## Pratique — Quick Start : planifier

1. Choisir la partie de stack utile.
2. Lister les étapes dans l’ordre.
3. Prévoir un test par résultat attendu.

---

<!-- _class: light -->

## Pratique — Quick Start : vérifier

- Le lab répond-il au besoin défini ?
- La technologie est-elle justifiée ?
- Un étudiant peut-il suivre et vérifier chaque étape ?

**Livrable :** un plan prêt à être développé en lab.
