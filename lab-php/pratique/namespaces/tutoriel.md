# Tutoriel : namespaces

## Objectif

Organiser le modèle `Article` et le `ArticleRepository` dans des espaces de noms distincts, puis importer le dépôt dans le point d'entrée.

## Explication pas à pas

L'exemple utilise trois fichiers : [`app/Models/Article.php`](app/Models/Article.php), [`app/Repositories/ArticleRepository.php`](app/Repositories/ArticleRepository.php) et [`demo.php`](demo.php).

1. Dans `Article.php`, `namespace App\Models` donne à la classe son nom complet `App\Models\Article`. Son constructeur reçoit un titre et le stocke dans la propriété publique en lecture seule `$titre`.
2. Dans `ArticleRepository.php`, `namespace App\Repositories` place le dépôt dans un espace de noms distinct. La ligne `use App\Models\Article` permet d'utiliser le modèle sans répéter son nom complet.
3. La méthode `trouver(int $id): ?Article` reçoit un identifiant entier et annonce qu'elle renvoie soit un objet `Article`, soit `null`. Dans cet exemple en mémoire, l'identifiant `1` renvoie un article; les autres identifiants renvoient `null`.
4. `demo.php` utilise `require __DIR__` pour charger d'abord les deux classes. `__DIR__` désigne le dossier où se trouve le fichier courant, ce qui rend les chemins indépendants du dossier depuis lequel la commande est lancée.
5. `use App\Repositories\ArticleRepository` importe ensuite le dépôt. Le script crée le dépôt puis appelle `trouver(1)`.
6. Si le résultat est `null`, le `if` affiche « Article introuvable. » et `exit(0)` termine le script. Sinon, le script affiche le titre de l'article.

Les namespaces évitent les collisions de noms et rendent le rôle des classes visible. Le projet Laravel associe déjà `App\` au dossier `app/` avec Composer. Pour cette démonstration autonome, les fichiers sont chargés explicitement au lieu de dépendre d'un autoloader Composer.

## Exécuter

Depuis le dossier `pratique` :

```powershell
php .\namespaces\demo.php
```

Résultat attendu :

```text
Decouvrir les namespaces
```

Cette sortie correspond au titre de l'objet `Article` créé par le dépôt pour l'identifiant `1`.

## À retenir

- Le namespace d'une classe correspond à son organisation logique, pas directement à un mécanisme d'inclusion de fichier.
- `use` importe un nom pleinement qualifié pour simplifier son utilisation.
- Dans une application Laravel, Composer charge normalement les classes via le mapping PSR-4; ici, les `require` gardent l'exercice exécutable seul.

## Pour aller plus loin

Dans `demo.php`, remplace l'identifiant `1` par `2` et observe le message « Article introuvable. ».