# Pratique détaillée

> Pour chaque étape, expliquer l’action, comment la réaliser, pourquoi elle est importante, le résultat attendu et comment le vérifier.

---

## 1. Outils, préparation et vérification

### Étape 1.1 — Préparation de l’espace de travail
- **Action :** Créer le dossier de projet et initialiser les fichiers de cadrage et de maquettage.
- **Comment :** Dans votre espace de travail, créer un dossier `workspace-design-thinking/` contenant un fichier Markdown `cadrage-design-thinking.md` et un fichier `dashboard.html`.
- **Pourquoi et importance :** Conserver un dossier organisé permet de tracer chaque phase du Design Thinking sans mélanger la réflexion méthodologique et le code de restitution.
- **Résultat attendu :** Les fichiers `cadrage-design-thinking.md` et `dashboard.html` sont créés et prêts à être édités.
- **Vérification :** Vérifier dans l'explorateur ou avec la commande `ls` que les deux fichiers existent.

### Étape 1.2 — Vérification de l'environnement de rendu
- **Action :** Tester l'ouverture du fichier HTML dans un navigateur moderne.
- **Comment :** Ouvrir `dashboard.html` dans Chrome, Edge ou Firefox (via un double-clic ou l’extension Live Server).
- **Pourquoi et importance :** Le prototypage en Design Thinking repose sur un feedback visuel immédiat pour tester l'ergonomie et la hiérarchie de l'information.
- **Résultat attendu :** La page s'ouvre dans le navigateur sans erreur dans la console de développement (F12).
- **Vérification :** Vérifier qu'aucune erreur de chargement n'apparaît dans la console du navigateur.

---

## 2. Empathie — Première pratique

### Étape 2.1 — Analyse et structuration des 7 besoins d'Empathie
- **Action :** Qualifier et regrouper les 7 besoins réels issus des observations de terrain dans `cadrage-design-thinking.md`.
- **Comment :** Rédiger un tableau comparant les besoins exprimés par les apprenants et par le livecodeur :
  1. *Annonce de la date du livecoding :* Nécessité de connaître à l'avance la programmation pour s'organiser.
  2. *Affichage du prochain livecoding :* Besoin d'un point de repère visuel immédiat avec le compte à rebours de la séance.
  3. *Projets « en cours » par priorité (+ tous les projets) :* Nécessité de mettre en avant les projets urgents sans masquer l'historique complet.
  4. *Affichage des tâches « en cours » :* Suivi précis de ce qui est en cours de développement.
  5. *Affichage des tâches « Révision nécessaire » :* Isolement des tâches nécessitant une correction urgente.
  6. *Notifications visibles et extensibles :* Réception d'alertes discrètes pouvant être déployées au clic.
  7. *Accès facile aux éléments « en cours » pour le livecodeur :* Mode ciblé permettant d'animer la séance sans distraction.
- **Pourquoi et importance :** L’empathie donne du sens à la conception en reliant chaque composant d'interface à une attente concrète des utilisateurs finaux.
- **Résultat attendu :** Un tableau d'empathie structuré reliant chaque besoin à sa cible et à son contexte d'utilisation.
- **Vérification :** Contrôler que les 7 besoins d'origine sont tous présents et documentés.

---

## 3. Quick Start : Définition, Idéation et Prototypage

### Étape 3.1 — Quick Start : Phase de Définition (Define)
- **Action :** Rédiger l'énoncé du problème, le Point de Vue (POV) du livecodeur et les questions directrices « How Might We » (HMW).
- **Comment :** Formaliser dans `cadrage-design-thinking.md` :
  - *Énoncé du problème :* Les apprenants et le livecodeur perdent du temps et risquent d'oublier des livrables essentiels en raison de l'éparpillement des informations de suivi et du manque de hiérarchie visuelle.
  - *Point de Vue (POV) du livecodeur :* **Le livecodeur** a besoin d'un **accès direct et hiérarchisé aux dates, projets prioritaires et révisions en cours** parce que **la préparation et l'animation d'une séance en direct exigent une visibilité instantanée sans recherche laborieuse**.
  - *Questions directrices « How Might We » :*
    - *HMW 1 (Besoins 1 & 2) :* Comment afficher la date et le prochain livecoding dès l'en-tête de manière incontournable ?
    - *HMW 2 (Besoins 3, 4 & 5) :* Comment ordonner les projets par priorité et faire ressortir nettement les révisions nécessaires ?
    - *HMW 3 (Besoins 6 & 7) :* Comment concevoir un centre de notifications extensible et un bouton d'accès rapide pour le livecodeur ?
- **Pourquoi et importance :** La Définition transforme un ensemble d'observations disparates en une problématique claire et actionnable pour l'équipe de conception.
- **Résultat attendu :** Le problème, le POV et les 3 questions HMW sont rédigés et validés.
- **Vérification :** S'assurer que le POV prend directement en compte les besoins n°5 (révisions nécessaires) et n°7 (accès rapide livecodeur).

### Étape 3.2 — Quick Start : Phase d'Idéation (Ideate)
- **Action :** Associer une réponse d'interface ergonomique à chacun des 7 besoins et concevoir le schéma de zoning du tableau de bord.
- **Comment :** Rédiger la matrice de sélection d'interface dans `cadrage-design-thinking.md` :
  - *Solutions Besoins 1 & 2 :* Bannière supérieure avec badge « Prochain Livecoding » + date annoncée et intitulé de séance.
  - *Solution Besoin 3 :* Grille de projets avec badges d'urgence (Priorité 1, Priorité 2) et lien d'accès au catalogue complet.
  - *Solution Besoin 4 :* Liste de cartes « Tâches en cours » montrant l'état d'avancement des activités.
  - *Solution Besoin 5 :* Encadré d'alerte spécifique avec contour distinctif (orange/ambre) dédié aux tâches « Révision nécessaire ».
  - *Solution Besoin 6 :* Tiroir interactif de notifications basé sur le composant extensible `<details><summary>`.
  - *Solution Besoin 7 :* Bouton filtre « Vue Livecodeur (En cours) » permettant de masquer les éléments secondaires en un clic.
- **Pourquoi et importance :** L’Idéation permet de sélectionner les solutions visuelles les plus adaptées avant d’engager le développement.
- **Résultat attendu :** Une matrice associant explicitement les 7 besoins à des composants d'interface ergonomiques.
- **Vérification :** Contrôler la correspondance bijective : chaque besoin dispose de sa solution UI validée.

### Étape 3.3 — Quick Start : Prototypage et assemblage du tableau de bord
- **Action :** Intégrer les 7 composants d'Idéation dans le fichier `dashboard.html`.
- **Comment :** Saisir le code HTML/CSS dans `workspace-design-thinking/dashboard.html` :
```html
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Tableau de bord — Démarche Design Thinking</title>
  <style>
    body { font-family: system-ui, sans-serif; background: #0f172a; color: #f8fafc; margin: 0; padding: 24px; }
    .header-banner { background: #1e293b; padding: 18px 24px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center; border-left: 6px solid #38bdf8; }
    .badge-live { background: #0284c7; color: white; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 13px; }
    .btn-livecoder { background: #38bdf8; color: #0f172a; border: none; padding: 8px 16px; border-radius: 6px; font-weight: bold; cursor: pointer; }
    .grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-top: 24px; }
    .card { background: #1e293b; border-radius: 10px; padding: 20px; border: 1px solid #334155; }
    .priority-item { border-left: 4px solid #ef4444; padding: 10px; margin-bottom: 8px; background: #0f172a; border-radius: 4px; }
    .revision-box { background: rgba(245, 158, 11, 0.12); border: 2px dashed #f59e0b; padding: 14px; border-radius: 6px; margin-top: 12px; }
    details { background: #0f172a; padding: 12px; border-radius: 6px; }
    summary { cursor: pointer; font-weight: 600; color: #38bdf8; }
  </style>
</head>
<body>
  <!-- Besoins 1, 2 et 7 : Livecoding et Accès Rapide Livecodeur -->
  <header class="header-banner">
    <div>
      <span class="badge-live">Prochain Livecoding</span>
      <h2 style="margin: 6px 0 2px;">Jeudi 14h00 : Architecture API & Design Thinking</h2>
      <small style="color: #94a3b8;">Date annoncée : 30 Octobre 2026</small>
    </div>
    <button class="btn-livecoder">Vue Livecodeur (En cours)</button>
  </header>

  <main class="grid">
    <div>
      <!-- Besoin 3 : Projets en cours par priorité + tous les projets -->
      <section class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
          <h3 style="margin: 0;">Projets en cours (par priorité)</h3>
          <a href="#all" style="color: #38bdf8; text-decoration: none; font-size: 14px;">Tous les projets (12) →</a>
        </div>
        <div class="priority-item"><strong>Priorité 1 :</strong> Lab Design Thinking — Tableau de bord</div>
        <div class="priority-item" style="border-left-color: #f59e0b;"><strong>Priorité 2 :</strong> API Laravel — Contrôleurs et Policies</div>
      </section>

      <!-- Besoins 4 et 5 : Tâches en cours et Révisions nécessaires -->
      <section class="card" style="margin-top: 20px;">
        <h3 style="margin-top: 0;">Tâches actives</h3>
        <p>🔄 Tâche en cours : Structuration du composant d'accueil</p>
        <div class="revision-box">
          <strong style="color: #f59e0b;">⚠️ Révision nécessaire :</strong>
          <p style="margin: 6px 0 0;">Validation du schéma relationnel — retour formateur en attente de correction.</p>
        </div>
      </section>
    </div>

    <!-- Besoin 6 : Notifications visibles et extensibles -->
    <aside class="card">
      <h3 style="margin-top: 0;">Centre d'alertes</h3>
      <details open>
        <summary>Notifications visibles (3)</summary>
        <ul style="padding-left: 20px; font-size: 14px; margin-top: 10px;">
          <li>Nouvelle révision requise sur le Lab.</li>
          <li>Date du livecoding fixée à jeudi 14h.</li>
          <li>Mise à jour du backlog de projet.</li>
        </ul>
      </details>
    </aside>
  </main>
</body>
</html>
```
- **Pourquoi et importance :** Matérialiser la démarche sous forme d'un livrable interactif autonome pour valider visuellement la résolution des 7 besoins.
- **Résultat attendu :** Un fichier `dashboard.html` opérationnel présentant une interface élégante, responsive et centrée utilisateur.
- **Vérification :** Ouvrir `dashboard.html` dans le navigateur, tester l'extension du volet de notifications (Besoin 6) et vérifier que les 7 besoins sont tous fonctionnels.

---

## Résultat final et validation

Le résultat final valide la démarche complète du Design Thinking :
1. Une analyse d’**Empathie** structurée autour des 7 besoins de terrain.
2. Une phase de **Définition** rigoureuse (POV livecodeur et questions HMW).
3. Une phase d’**Idéation** complète matérialisée par la matrice des composants et le prototype fonctionnel `dashboard.html`.

---

## Livrables et critères d’acceptation

### Livrables
- Le document de démarche `cadrage-design-thinking.md`.
- Le prototype fonctionnel du tableau de bord `dashboard.html`.
- Le support de présentation `4-presentation.md`.

### Critères d’acceptation
- [x] Les 7 besoins issus d'Empathy sont tous documentés et traités.
- [x] La phase Définition formule un Point de Vue (POV) centré sur le livecodeur.
- [x] La phase Idéation fournit une réponse d'interface pour chacun des 7 besoins.
- [x] Le composant Livecoding affiche la date annoncée et la prochaine séance (Besoins 1 & 2).
- [x] Les projets sont classés par priorité avec un accès à tous les projets (Besoin 3).
- [x] Les tâches « en cours » et « Révision nécessaire » sont distinctes (Besoins 4 & 5).
- [x] Le panneau de notifications est interactif et extensible (Besoin 6).
- [x] L'accès rapide pour le livecodeur est opérationnel via le bouton dédié (Besoin 7).

---

## Défi facultatif
Ajouter un filtre JavaScript sur le bouton « Vue Livecodeur » permettant de basculer en temps réel entre la vue standard et la vue épurée isolant uniquement les projets prioritaires et les révisions en cours.
