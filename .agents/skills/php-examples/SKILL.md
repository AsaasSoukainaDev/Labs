---
name: php-examples
description: Creates, adapts, and validates practical PHP examples that fit a project's PHP version and architecture. Use when asked for PHP exercises, lab examples, runnable snippets, or examples of exceptions, namespaces, traits, or Laravel conventions.
---

# PHP Example Creator

## Rôle

Créer des exemples PHP courts, compréhensibles, exécutables et adaptés au projet réel de l'utilisateur.

## Quand utiliser cette skill

Utilise-la pour créer ou adapter des exercices PHP, des exemples de notions du langage, des démonstrations Laravel ou du contenu pratique pour un lab. Ne l'utilise pas pour réécrire une application complète sans demande explicite.

## Entrées et contexte

- Lis le README ou le brief fourni et les fichiers voisins de la destination demandée.
- Examine `composer.json`, les instructions applicables et le code pertinent pour identifier la version PHP, le framework, l'autoload et les conventions réelles.
- Repère si l'exemple peut utiliser des classes ou services existants. N'invente pas de modèles, de dépendances, de versions ou de problèmes vécus.
- Si un détail manque mais qu'une hypothèse simple permet d'avancer, choisis un exemple autonome et signale clairement ce qui est simulé. Demande une précision seulement si le choix change sensiblement le résultat.

## Procédure

1. Reformule le livrable attendu et choisis le chemin demandé. Préserve les fichiers existants; ne les remplace pas sans examiner leur contenu.
2. Déduis la version PHP et les dépendances à partir des fichiers du projet. N'utilise que des fonctions, syntaxes et commandes compatibles.
3. Relie chaque exemple à un cas d'usage concret du projet. Pour des notions distinctes, crée un petit exercice par notion et un guide concis si plusieurs commandes doivent être exécutées.
4. Pour chaque exercice, explique son objectif, sa relation à l'architecture et comment le lancer. Distingue clairement une démonstration autonome d'une fonctionnalité réellement intégrée.
5. Garde le code petit et pédagogique : entrées explicites, noms descriptifs, types lorsque le projet les utilise et sorties observables. Montre les exceptions traitées à une frontière appropriée; emploie les namespaces selon l'autoload réel; n'emploie un trait que pour un comportement partagé qui s'y prête.
6. Valide les fichiers PHP avec `php -l` si PHP est disponible. Lance les tests ciblés pertinents si le projet en possède. Si les outils manquent, ne prétends pas avoir exécuté les exemples et indique précisément la vérification à effectuer.
7. Résume les fichiers créés, les commandes d'exécution, le résultat de validation et les limites éventuelles.

## Règles

- Réponds dans la langue de la demande, en préservant la langue et le style des fichiers existants.
- N'intègre pas une démonstration au framework si elle peut être plus clairement exécutée seule; si elle dépend de Laravel, respecte ses conventions plutôt que de simuler ses APIs.
- N'expose pas de secrets et ne modifie jamais `.env`.
- Évite les dépendances supplémentaires pour de simples exemples du langage.
- Ne présente pas une donnée fictive comme une donnée réelle, ni un exercice autonome comme du code déjà intégré.
- Limite les modifications aux fichiers demandés et aux documents d'exécution nécessaires.

## Exemples de demandes

- « Crée un exemple PHP d'exception pour le formulaire de création d'article. »
- « Prépare trois exercices exécutables sur les namespaces, les traits et les exceptions. »
- « Adapte cet exemple PHP à la version et à l'autoload Composer de mon projet. »

## Vérification finale

- Chaque notion demandée possède un exemple clairement identifiable.
- Les exemples respectent la version et les conventions constatées.
- Les chemins et commandes correspondent à la structure créée.
- Le statut des vérifications est rapporté sans exagération.