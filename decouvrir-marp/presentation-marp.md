---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    background: #fbfaf6;
    border-top: 8px solid #d2704e;
    color: #183b39;
    font-family: "Aptos", "Segoe UI", sans-serif;
  }

  section h1,
  section h2 {
    color: #a94732;
  }

  section code,
  section pre {
    background: #e9efeb;
    color: #183b39;
  }

  section.light {
    background: #eaf2ee;
    color: #183b39;
  }

  section.light h1,
  section.light h2 {
    color: #a94732;
  }

  section.light code,
  section.light pre {
    background: #dfeae5;
    color: #183b39;
  }

  section.lead {
    align-items: center;
    justify-content: center;
    text-align: center;
    background: #eaf2ee;
  }

  section strong {
    color: #925c16;
  }
---

<!-- _class: lead -->

# Découvrir Marp

---

<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## Introduction

Marp transforme du **Markdown** en diapositives de présentation.

- Objectif : écrire, prévisualiser et exporter un diaporama.
- Outils : Marp for VS Code et Marp CLI.
- Notions : front matter, séparateurs, directives et thèmes.

---

<!-- _class: light -->

## Problems Encountered

Aucun incident bloquant n’a été signalé pour ce lab.

Points de vigilance fréquents :

- L’aperçu ne s’active pas si `marp: true` manque.
- Un `---` mal placé peut créer une diapositive inattendue.
- L’export CLI dépend de Node.js et de Marp CLI.

---

## Solutions Implemented

- Installer l’extension **Marp for VS Code** pour écrire et prévisualiser.
- Ajouter `marp: true` au front matter; séparer les pages par `---`.
- Installer Node.js et Marp CLI pour exporter depuis la ligne de commande.

```bash
npm install -g @marp-team/marp-cli
marp --version
```

---

<!-- _class: light -->

## Structure d’un fichier Marp

Le front matter configure le diaporama. Chaque séparateur hors code ouvre
une nouvelle diapositive.

````markdown
---
marp: true
theme: default
paginate: true
size: 16:9
---

# Première diapositive
Une idée principale.

---
<!-- _class: lead -->
## Titre mis en évidence
````

Une directive locale s’applique à la diapositive suivante. Les options
incluent `_class`, `_backgroundColor` et `_color`.

---

## Styles, thèmes et images

- Thèmes intégrés : `default`, `gaia`, `uncover`.
- Le CSS personnalise couleurs et typographie.
- Les directives d’image contrôlent le placement.

```css
section {
  background: #fbfaf6;
  color: #183b39;
}
```

````markdown
![Schéma du projet](images/schema.png)
![bg right:40%](images/schema.png)
````

Utiliser un texte alternatif et un chemin relatif. `bg`, `right`, `cover` et
`contain` règlent l’arrière-plan.

---

<!-- _class: light -->

## Prévisualiser et exporter

1. Ouvrir la palette avec `Ctrl + Shift + P`.
2. Choisir `Marp: Open Preview` ou `Marp: Open Preview to the Side`.
3. Vérifier le texte, les images et le nombre de pages.

Pour exporter avec Marp CLI :

```bash
marp presentation.md --html
marp presentation.md --pdf
marp presentation.md --pptx
```

L’export PDF ou PowerPoint requiert les dépendances correspondantes.

---

## Mise en pratique

Créer `presentation.md`, ajouter le front matter, puis rédiger deux pages :

````markdown
---
marp: true
theme: default
paginate: true
---

# Objectif
Présenter une idée.

---

# Résultat
Prévisualiser les deux diapositives.
````

---

## En bref

Marp associe la simplicité de Markdown à des présentations exportables.

- Écrire le contenu dans un fichier `.md`.
- Prévisualiser avec Marp for VS Code.
- Exporter avec VS Code ou Marp CLI.

- Une idée par page; vérifier le rendu avant le partage.
- Utiliser des images avec texte alternatif et chemins vérifiés.

- [Marp](https://marp.app)
- [Marp for VS Code](https://marketplace.visualstudio.com/items?itemName=marp-team.marp-vscode)
