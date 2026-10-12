# Antigravity — Documentation

> Documentation non officielle, basée sur les connaissances publiques et le fichier fourni.  
> Les noms, menus et dossiers peuvent varier selon la version de votre laboratoire.  
> Vérifiez toujours la configuration réelle dans votre environnement.

---

## Table des matières

1. Présentation
2. Concepts clés et prérequis
3. Workflow
4. Structure de prompt
5. Rules et Skills
6. MCP
7. Bonnes pratiques
8. Dépannage
9. Glossaire
10. Conclusion

---

## 1. Présentation

Antigravity est un environnement de développement construit autour d’agents IA.  
Les agents peuvent planifier, écrire du code, exécuter des commandes et tester le travail.  
L’utilisateur supervise, valide et vérifie les résultats.

---

## 2. Concepts clés et prérequis

### 2.1 Concepts clés

| Terme | Définition |
|---|---|
| Agent | IA qui planifie, code, exécute et teste. |
| Plan | Proposition d’étapes avant modification. |
| Rule | Consigne permanente toujours active. |
| Skill | Compétence réutilisable déclenchée par l’agent. |
| MCP | Protocole qui connecte l’agent à des outils externes. |
| Prompt | Instruction donnée à l’agent. |
| Scope | Périmètre de travail autorisé. |
| Done condition | Critère qui prouve que la tâche est terminée. |

### 2.2 Prérequis

- Antigravity installé et fonctionnel.
- Un projet ou dossier de travail accessible.
- Un accès aux fichiers du projet.
- Si MCP est utilisé : un token ou une clé d’API pour le service externe.
- Connaître les commandes de base du projet : build, test, lint.

---

## 3. Workflow

**Plan → Review → Execute → Verify**

1. **Plan** : demander d’abord un plan à l’agent, par exemple avec `/plan`.
2. **Review** : lire le plan et le corriger avant toute modification de fichier.
3. **Execute** : laisser l’agent exécuter le travail.
4. **Verify** : tester le résultat soi-même.

---

## 4. Structure de prompt

Goal: [ce qu’il faut construire ou corriger]
Context: [projet, langage, framework]
Scope: [où travailler, ce qu’il ne faut pas toucher]
Constraints: [règles, bibliothèques, style]
Process: Montre-moi d’abord un plan, puis attends mon approbation.
Done when: [comment vérifier que ça fonctionne]
Output: Résume brièvement tes changements.
---
## 4.1 Éléments obligatoires
Goal

Context

Scope

Done condition

## 5. Rules et Skills
Fonctionnalité	Déclenchement	Utilisation
Rules	Toujours actives	Consignes permanentes et rôles
Skills	L’agent décide	Expertise réutilisable pour une tâche
5.1 Créer une rule (rôle)
Fichier : .agents/rules/backend-developer.md

text
You are a senior Laravel backend developer.
- Always show a short plan before changing files.
- Never touch the .env file.
## 5.2 Créer une skill
Fichier : .agents/skills/laravel-crud/SKILL.md

markdown
---
name: laravel-crud
description: Builds a full CRUD in Laravel. Use when asked to create a CRUD.
---
# Laravel CRUD
1. Create the migration and the model.
2. Create the controller with validation.
3. Add the routes and the Blade views.
5.3 Demander à l’agent de les utiliser
text
Read C:/agent-kit/rules/ and follow them.
Use the laravel-crud skill for this task.
Adaptez le chemin à votre installation.
Dans certains environnements, il peut être .agents/rules/ ou C:/agent-kit/rules/.

6. MCP
MCP connecte l’agent à des outils externes : GitHub, Google Drive, bases de données, etc.

6.1 Configuration
Ouvrir le panneau de l’agent.

Cliquer sur le menu "...".

Aller dans Manage MCP Servers.

Cliquer sur View raw config.

Ajouter un serveur dans mcpServers dans mcp_config.json.

Sauvegarder.

Cliquer sur Refresh.

Redémarrer Antigravity si le serveur n’apparaît pas.

## 6.2 Exemple : serveur distant GitHub
json
{
  "mcpServers": {
    "github": {
      "serverUrl": "https://api.githubcopilot.com/mcp/",
      "headers": { "Authorization": "Bearer YOUR_TOKEN_HERE" }
    }
  }
}
Ne mettez jamais un vrai token en clair dans un fichier partagé.
Utilisez des variables d’environnement ou un gestionnaire de secrets.

## 7. Bonnes pratiques
Toujours demander un plan avant exécution.

Définir un Scope précis pour éviter les modifications indésirables.

Vérifier le résultat soi-même après chaque tâche.

Ne jamais laisser l’agent toucher aux fichiers sensibles : .env, secrets, clés.

Utiliser des Rules pour les conventions d’équipe.

Utiliser des Skills pour les tâches répétitives.

Découper les grosses tâches en petites étapes.

Lire les diffs avant de valider.

Sauvegarder ou commiter avant une grosse modification.

## 8. Dépannage
Problème	Solution possible
Le serveur MCP n’apparaît pas	Vérifier le JSON, cliquer sur Refresh, redémarrer Antigravity.
L’agent ne suit pas les Rules	Vérifier le chemin, demander explicitement de les lire.
La Skill ne se déclenche pas	Vérifier name et description, demander explicitement la skill.
L’agent modifie trop de fichiers	Réduire le Scope dans le prompt.
Le token GitHub est refusé	Vérifier le token, les droits et le format Bearer.
Le plan est trop vague	Demander un plan détaillé avec étapes et fichiers concernés.
## 9. Glossaire
Agent : programme IA qui agit sur le projet.

Antigravity : environnement de développement assisté par agents.

Done condition : critère de réussite d’une tâche.

MCP : Model Context Protocol, connexion à des outils externes.

Plan : liste d’étapes proposée avant exécution.

Prompt : instruction envoyée à l’agent.

Rule : règle permanente.

Scope : périmètre autorisé.

Skill : compétence réutilisable.

## 10. Conclusion
Antigravity permet de superviser des agents IA pour planifier, coder, exécuter et tester.
Pour l’utiliser efficacement :

Donnez un prompt clair avec Goal, Context, Scope et Done condition.

Exigez toujours un plan avant exécution.

Utilisez des Rules pour les consignes permanentes.

Utilisez des Skills pour les tâches répétitives.

Connectez des outils externes via MCP si nécessaire.

Vérifiez toujours le résultat vous-même.