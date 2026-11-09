---
marp: true
theme: default
paginate: true
---

# Markdown : documenter sans complexité

**Une syntaxe simple pour écrire des documents clairs.**

---

## Plan

- Le problème de la documentation.
- Markdown et ses avantages.
- Les éléments essentiels : titres, mise en forme, listes et liens.
- Code, tableaux et prévisualisation dans VS Code.

---

## Le problème : une documentation difficile à maintenir

Dans un projet web, les documents deviennent vite :

- difficiles à mettre en forme;
- peu structurés et pénibles à parcourir;
- compliqués à modifier sans perdre leur lisibilité.

**Résultat :** les consignes et les informations utiles se perdent.

---

## La solution : Markdown

Markdown est un langage de balisage léger : quelques signes décrivent la
structure et le style d’un texte.

- Lisible même sans prévisualisation.
- Facile à écrire et à modifier.
- Adapté aux fichiers `README.md`, guides et notes de projet.

---

## Titres, gras et italique

**Code Markdown :**

```markdown
## Installation
**Étape importante** — *note complémentaire*
```

**Rendu attendu :**

### Installation

**Étape importante** — *note complémentaire*

---

## Listes et liens

**Code Markdown :**

```markdown
- Lire le guide
- Installer les dépendances

[Documentation VS Code](https://code.visualstudio.com/)
```

**Rendu attendu :**

- Lire le guide
- Installer les dépendances

[Documentation VS Code](https://code.visualstudio.com/)

---

## Blocs de code

Indiquer le langage après les trois accents graves active la coloration.

**Code Markdown :**

````markdown
```js
console.log("Bonjour !");
```
````

**Rendu attendu :**

```js
console.log("Bonjour !");
```

---

## Tableaux

**Code Markdown :**

```markdown
| Fichier | Rôle |
| --- | --- |
| index.html | Structure |
| style.css | Présentation |
```

**Rendu attendu :**

| Fichier | Rôle |
| --- | --- |
| index.html | Structure |
| style.css | Présentation |

---

## Créer et prévisualiser un fichier Markdown

1. Créer un fichier avec l’extension `.md`, par exemple `README.md`.
2. Écrire le contenu avec les signes Markdown.
3. Ouvrir l’aperçu avec `Ctrl + Shift + V`.

Pour une présentation, ajouter le front matter Marp et séparer les diapositives
avec `---`, puis ouvrir l’aperçu Marp.

---

## Conclution

- Markdown transforme une syntaxe simple en document structuré.
- Il facilite la rédaction et la maintenance de la documentation web.
- Titres, listes, liens, code et tableaux couvrent l’essentiel.

**Écrire simplement, relire facilement, maintenir sereinement.**
