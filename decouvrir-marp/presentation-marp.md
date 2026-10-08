---
marp: true
theme: default
paginate: true
size: 16:9
header: "Découvrir Marp"
footer: "Atelier de présentation"
---

<style>
section {
  font-family: "Aptos", "Segoe UI", sans-serif;
  color: #263746;
  background: #f7fafc;
}

section h1,
section h2 {
  color: #174a6e;
}

section.lead {
  justify-content: center;
  text-align: center;
  background: linear-gradient(135deg, #eaf5fb, #f8f6f0);
}

section.lead h1 {
  color: #123b58;
  font-size: 2.2em;
}
</style>

<!-- _class: lead -->

# Découvrir Marp

- Présentations Markdown

---

# Sommaire

- Définition et usages
- Avantages
- Installation VS Code, CLI
- Syntaxe, directives, thèmes
- Prévisualisation, export, bonnes pratiques

---

# Qu’est-ce que Marp ?

- Écosystème de présentations Markdown
- Marp for VS Code : édition, aperçu
- Marp CLI : génération multi-format
- Marpit : moteur de rendu HTML
- Source texte, versionnable avec Git

---

# Pourquoi utiliser Marp ?

- Rédaction rapide
- Révisions versionnées avec Git
- Thèmes et CSS réutilisables
- Exports multiples, source unique
- Automatisation via CLI

---

# Installer Marp : VS Code

- Installer l’extension Marp for VS Code
- Ouvrir un fichier `.md`
- Lancer l’aperçu Marp intégré
- Prérequis : Visual Studio Code

---

# Installer Marp : CLI et Docker

- Prérequis : Node.js ou Docker Desktop

````bash
npm install -g @marp-team/marp-cli
marp --version
docker run --rm marpteam/marp-cli --version
````

---

# Structure d’un fichier Marp

- Front matter : configuration globale
- `---` : nouvelle diapositive

````markdown
---
marp: true
theme: default
paginate: true
size: 16:9
---

# Titre
- Message clé
````

---

# Directives Marp

- Globales : `theme`, `paginate`
- Locales : `_class`, `_backgroundColor`, `_color`

````markdown
<!-- _class: lead -->
# Titre de la diapositive
````

---

# Thèmes et personnalisation

- Thèmes : `default`, `gaia`, `uncover`
- CSS global : balise `<style>`
- Style des diapositives : sélecteur `section`

````html
<style>
section { color: #174a6e; }
</style>
````

---

# Images et arrière-plans

- Image : `![Alt](images/a.png)`

````markdown
![bg right:40%](images/a.png)
````

- Options : `cover`, `contain`, `right`
- Chemins relatifs au Markdown
- Texte alternatif descriptif

---

# Prévisualiser dans VS Code

- Palette : `Ctrl+Shift+P`
- Aperçu : `Marp: Open Preview`
- Aperçu latéral : `Marp: Open Preview to the Side`

---

# Exporter : CLI et VS Code

- VS Code : `Ctrl+Shift+P` → `Marp: Export`

````bash
marp presentation.md --html
marp presentation.md --pdf
marp presentation.md --pptx
marp presentation.md --images png
````

---

# Bonnes pratiques

- Une idée principale par slide
- Titres informatifs, listes concises
- Contraste élevé, typographie lisible
- Textes alternatifs, chemins vérifiés
- Aperçu avant export et partage

---

# Marp et les outils de présentation

| Critère | Marp | Slides |
|---|---|---|
| Création | Markdown | Interface |
| Versions | Git | Cloud |
| Export | CLI, multi-format | Intégré |
| Mise en page | CSS | Visuelle |

---

# Mémo Marp

````markdown
---
marp: true
# Slide
````

- `---` : nouvelle slide
- `_class` : style local
- `--pdf` : export

---

# Ressources

- [Marp](https://marp.app)
- [Marp CLI](https://github.com/marp-team/marp-cli)
- [Marp for VS Code](https://marketplace.visualstudio.com/items?itemName=marp-team.marp-vscode)
