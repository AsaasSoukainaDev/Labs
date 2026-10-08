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

- Présentations en Markdown

---

# Sommaire

- Marp : outil et usages
- Installation : VS Code, npm, Docker
- Syntaxe : Markdown, directives
- Thèmes, images, exports
- Bonnes pratiques, comparaison, mémo

---

# Qu’est-ce que Marp ?

- Écosystème de présentations Markdown
- Marp for VS Code : édition, aperçu
- Marp CLI : exports en ligne de commande
- Marpit : moteur de rendu
- Source texte, historique Git

---

# Pourquoi utiliser Marp ?

- Rédaction rapide en Markdown
- Historique et collaboration avec Git
- Thèmes et styles réutilisables
- Exports multiples, source unique
- Génération automatisée avec la CLI

---

# Installer Marp

## Dans Visual Studio Code

- Extension : Marp for VS Code

## Avec npm

- Prérequis : Node.js, npm

````bash
npm install --global @marp-team/marp-cli
marp --version
````

## Avec Docker

- Prérequis : Docker Desktop

````powershell
docker run --rm -v "${PWD}:/work" marpteam/marp-cli /work/presentation.md --pdf -o /work/presentation.pdf
````

---

# Structure d’un fichier Marp

- Front matter : configuration du document
- `---` : nouvelle diapositive

````markdown
---
marp: true
theme: default
paginate: true
size: 16:9
---

# Première diapositive

- Message clé

---

# Deuxième diapositive

- Nouvelle idée
````


---

# Markdown pour présenter une idée

- **Gras** : notions clés
- *Italique* : nuances
- `Code` : commandes, fichiers
- `---` : séparation des diapositives
- Une idée principale par slide

---

<!-- _class: lead -->

# Directives Marp

| Portée | Exemple | Effet |
|---|---|---|
| Document | `theme: gaia` | Thème global |
| Document | `paginate: true` | Pagination globale |
| Diapositive | `<!-- _class: lead -->` | Classe locale |
| Diapositive | `<!-- _backgroundColor: #eaf5fb -->` | Fond local |

---

<!-- _backgroundColor: #eaf5fb -->
<!-- _color: #174a6e -->

# Modifier une seule diapositive

- `_` : directive pour la slide active

````markdown
<!-- _backgroundColor: #eaf5fb -->
<!-- _color: #174a6e -->

# Titre de la diapositive
````

---

# Thèmes et personnalisation

- Thèmes intégrés : `default`, `gaia`, `uncover`
- Personnalisation : CSS dans `<style>`

````yaml
theme: default
````


````html
<style>
section {
  font-family: "Aptos", sans-serif;
}

section h1 {
  color: #174a6e;
}
</style>
````

- Styles partagés : thème CSS Marp

---

# Images et arrière-plans

- Image intégrée au contenu

````markdown
![Description de l’image](images/schema.png)
````

- Image d’arrière-plan

````markdown
![bg right:40%](images/illustration.png)
````

- Options : `left`, `right`, `cover`, `contain`
- Texte alternatif : description de l’image

---

# Prévisualiser et exporter

## Prévisualiser dans VS Code

- `Marp: Open Preview`
- `Marp: Open Preview to the Side`

## Exporter avec la CLI

- Formats : HTML, PDF, PPTX, PNG

````bash
marp presentation.md --html
marp presentation.md --pdf
marp presentation.md --pptx
marp presentation.md --images png
````

````bash
marp presentation.md --pdf -o exports/presentation.pdf
````

- PDF : navigateur compatible requis

---

# Bonnes pratiques

- Une idée principale par diapositive
- Titres informatifs, listes courtes
- Contraste élevé, typographie lisible
- Texte alternatif pour chaque image
- Prévisualisation avant chaque export
- Chemins d’images vérifiés, commits Git

---

# Marp et les outils de présentation

| Critère | Marp | PowerPoint / Google Slides |
|---|---|---|
| Création | Markdown et éditeur de texte | Interface graphique |
| Suivi des versions | Naturel avec Git | Possible, selon l’outil |
| Mise en page libre | CSS et HTML possibles | Outils graphiques intégrés |
| Automatisation | CLI et scripts | Fonctions variables selon l’outil |
| Formats de sortie | HTML, PDF, PPTX, images | Formats natifs et exports intégrés |
| Idéal pour | Contenu structuré et reproductible | Composition visuelle directe et collaborative |

---

# Mémo Marp

````markdown
---
marp: true
theme: default
paginate: true
size: 16:9
---

<!-- _class: lead -->
# Titre de la présentation

---

# Nouvelle diapositive

- Texte **important**
- Image : `![Description](images/figure.png)`
````

- `---` : nouvelle diapositive
- `_class` : style local
- `_backgroundColor` : fond local
- `--pdf` : export PDF

---

<!-- _class: lead -->

# Ressources

- [Site officiel de Marp](https://marp.app)
- [Marp CLI sur GitHub](https://github.com/marp-team/marp-cli)
- [Marp for VS Code](https://marketplace.visualstudio.com/items?itemName=marp-team.marp-vscode)

- Prochaine étape : créer `presentation.md`
