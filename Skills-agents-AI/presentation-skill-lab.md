---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    background-color: #0f172a;
    color: #f8fafc;
    font-family: 'Inter', system-ui, sans-serif;
    padding: 40px 60px;
  }
  h1, h2, h3 {
    font-family: 'Inter', system-ui, sans-serif;
    font-weight: 600;
    letter-spacing: -0.02em;
  }
  h1 {
    color: #38bdf8;
    font-size: 1.8em;
  }
  h2 {
    color: #38bdf8;
    font-size: 1.3em;
  }
  h3 {
    color: #7dd3fc;
    font-size: 1.05em;
  }
  section.light {
    background-color: #f8fafc;
    color: #0f172a;
  }
  section.light h1, section.light h2, section.light h3 {
    color: #0284c7;
  }
  pre, code {
    background-color: #1e293b;
    color: #e2e8f0;
    border-radius: 6px;
    font-family: 'Fira Code', 'Consolas', monospace;
  }
  section.light pre, section.light code {
    background-color: #e2e8f0;
    color: #0f172a;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.78em;
    line-height: 1.35;
  }
  th {
    background-color: #1e293b;
    color: #f8fafc;
    font-weight: 600;
    padding: 8px 10px;
    text-align: left;
    vertical-align: top;
  }
  td {
    background-color: #172033;
    color: #f8fafc;
    padding: 8px 10px;
    border-bottom: 1px solid #475569;
    vertical-align: top;
  }
  section.light th {
    background-color: #e0f2fe;
    color: #0f172a;
  }
  section.light td {
    background-color: #ffffff;
    color: #0f172a;
  }
  section.light tbody tr:nth-child(even) td {
    background-color: #f1f5f9;
  }
  section.light td {
    border-bottom: 1px solid #cbd5e1;
  }
---

# Créer un Skill pour une tâche

---
<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## 1. Introduction

- **But :** transformer une tâche répétée en une méthode claire qu’un agent IA peut réutiliser.
- **Objectifs :** reconnaître une tâche adaptée à un Skill, écrire ses instructions, et les rendre découvrables et vérifiables.
- **Concepts et outils :** Agent Skills, `SKILL.md`, YAML frontmatter, déclencheurs, instructions et critères de validation.
- **Exemple fil rouge :** le Skill `create-labs`, qui guide la création de labs et de présentations Marp dans ce dépôt.

---
<!-- _class: light -->

## 2. Problems Encountered

- Un Skill trop général ne dit pas à l’agent quand il doit être utilisé.
- Des consignes vagues laissent plusieurs interprétations possibles.
- Des chemins ou commandes propres à un outil peuvent ne pas fonctionner dans un autre agent.
- Sans critères observables, il est difficile de savoir si le Skill a réellement aidé.

---

## 3. Solutions Implemented

- Cibler un processus récurrent et écrire une description qui nomme ses déclencheurs.
- Décomposer le travail en étapes, décisions, contraintes et livrables concrets.
- Garder les instructions aussi portables que possible et signaler les différences entre outils.
- Essayer le Skill sur une vraie tâche, examiner le résultat et améliorer les consignes.

---
<!-- _class: light -->

## Qu’est-ce qu’un Skill ?

- Un dossier de connaissances et de consignes spécialisées qu’un agent peut charger quand elles sont pertinentes.
- Il peut contenir un fichier `SKILL.md` et, si nécessaire, des exemples, références ou scripts.
- Il complète le prompt : le prompt décrit la demande du moment; le Skill fournit une méthode réutilisable.
- Le format Agent Skills est conçu pour être partagé entre plusieurs agents compatibles.

Un Skill n’est pas une garantie que chaque demande l’activera : la description aide l’agent à reconnaître quand il est utile.

---

## Partir d’une tâche réelle

Prenons la création d’un lab qui revient souvent :

1. Choisir un sujet et un format.
2. Lire les conventions du dépôt et les exemples proches.
3. Rédiger un contenu pédagogique structuré.
4. Créer les fichiers et les liens nécessaires.
5. Vérifier ce qui a été livré.

Cette suite d’étapes répétable est un bon candidat pour un Skill comme `create-labs`.

---
<!-- _class: light -->

## Définir le périmètre avant d’écrire

Répondre à ces questions :

| Question | Exemple pour `create-labs` |
|:---|:---|
| Quand l’utiliser ? | Créer ou développer un lab ou une présentation pédagogique |
| Quel résultat produire ? | Source éditable et page d’entrée cohérente avec le dépôt |
| Quelles contraintes suivre ? | Respecter les conventions locales et préserver les autres fichiers |
| Comment vérifier ? | Vérifier les liens, la structure du deck et les fichiers attendus |

Un Skill est plus utile quand il enseigne une méthode précise, plutôt que « aider pour tout ».

---

## Écrire le fichier `SKILL.md`

Un Skill commence par des métadonnées YAML puis décrit son processus :

```markdown
---
name: create-labs
description: "Create or expand a learning lab or Marp deck in this repository."
---

# Create Labs

## When to Use
- When creating or expanding a lab or presentation.

## Workflow
1. Inspect repository conventions and nearby examples.
2. Create the editable source and entry page.
3. Add the lab to the presentation index.
4. Verify links and report what was completed.
```

Le nom du Skill doit correspondre au nom de son dossier.

---
<!-- _class: light -->

## Une description qui déclenche le bon Skill

La description est la première indication utilisée pour décider si le Skill s’applique.

**Trop vague :**

```text
A useful presentation skill.
```

**Plus claire :**

```text
Create or expand a learning lab, workshop, or Marp presentation
in this repository. Use when writing lab materials or slide decks.
```

Inclure les actions, les sujets concernés et les formulations que l’utilisateur pourrait employer.

---

## Transformer les besoins en workflow

Le Skill `create-labs` rend explicites les décisions et les livrables :

1. **Explorer :** lire l’index et les exemples pertinents.
2. **Choisir :** déterminer le dossier, la langue et le format.
3. **Rédiger :** suivre la structure pédagogique attendue.
4. **Intégrer :** créer la page d’entrée et ajouter le lien au catalogue.
5. **Vérifier :** contrôler les chemins, l’ordre des diapositives et le rendu disponible.

Les instructions décrivent quoi faire, pas une réponse figée à copier dans chaque projet.

---
<!-- _class: light -->

## Garder le Skill portable

- Utiliser les chemins relatifs pour les ressources du Skill.
- Ne pas supposer qu’un agent dispose d’une commande, d’une extension ou d’un outil particulier.
- Décrire le résultat attendu; choisir l’outil disponible dans l’environnement courant.
- Prévoir une solution de repli et signaler clairement une étape impossible.
- Respecter les variations de découverte, d’invocation et de capacités propres à chaque agent.

Exemple : demander de générer et vérifier un export Marp, sans imposer une commande qui n’existe pas partout.

---

## Utiliser un même Skill dans Antigravity et VS Code

Un Skill conforme au format Agent Skills peut être partagé, mais son emplacement découvert et certaines fonctions dépendent de l’agent.

| Environnement | Exemple d’emplacement du Skill projet |
|:---|:---|
| Antigravity | `.agents/skills/create-labs/SKILL.md` |
| VS Code / Copilot | `.agents/skills/create-labs/SKILL.md` |

Vérifier que le Skill apparaît et peut être invoqué dans chaque environnement. Ne pas supposer que toutes les options ou tous les outils sont identiques.

---
<!-- _class: light -->

## Tester et améliorer le Skill

Pour chaque agent :

1. Essayer une demande qui devrait activer le Skill.
2. Essayer une demande voisine qui ne devrait pas l’activer.
3. Comparer les livrables aux critères définis.
4. Noter les consignes ignorées, interprétées différemment ou impossibles à suivre.
5. Ajuster la description ou le workflow, puis recommencer.

**Pour `create-labs` :** demander un nouveau petit lab, puis vérifier la source Marp, la page d’entrée et le lien dans l’index.

---

## Atelier : créer un mini-Skill

Choisissez une tâche répétée, par exemple préparer une revue de code ou créer une fiche de révision.

1. Écrivez un nom et une description qui précisent quand l’utiliser.
2. Définissez le résultat attendu et les contraintes.
3. Rédigez trois à cinq étapes actionnables.
4. Ajoutez un critère permettant de vérifier le résultat.
5. Essayez le Skill dans Antigravity et dans VS Code, si les deux sont disponibles.

**Question de revue :** une autre personne peut-elle appliquer ce workflow sans deviner les étapes importantes ?

---
<!-- _class: light -->

## Résumé & matrice de vérification

| Objectif | Statut | Preuve dans le lab |
|:---|:---:|:---|
| Expliquer le rôle d’un Skill | Couvert | Définition et différence avec un prompt |
| Construire un Skill à partir d’une tâche | Couvert | Exemple `create-labs` et workflow |
| Améliorer découverte et portabilité | Couvert | Description et comparaison des agents |
| Évaluer et améliorer un Skill | Atelier | Procédure d’essai et critères de revue |

**À retenir :** une bonne description fait découvrir le Skill; un workflow précis aide l’agent à bien l’appliquer; des essais concrets révèlent ce qu’il faut améliorer.

**Sources :** [Agent Skills dans VS Code](https://code.visualstudio.com/docs/agent-customization/agent-skills) · [Agent Skills dans Antigravity](https://antigravity.google/docs/skills)