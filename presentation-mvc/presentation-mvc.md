# Diapositive 1 — Qu’est-ce que l’architecture MVC ?

**MVC** signifie **Model–View–Controller** (Modèle–Vue–Contrôleur). C’est une façon de répartir le code d’une application en trois rôles complémentaires.

- **Model (Modèle) :** représente les données et leur accès.
- **View (Vue) :** présente les informations à l’utilisateur.
- **Controller (Contrôleur) :** traite la demande et coordonne le modèle et la vue.

Cette séparation évite de mélanger l’accès aux données, l’affichage et le traitement des demandes. Le code devient plus lisible et plus facile à faire évoluer.

## Notes pour l’oral

« MVC est une manière d’organiser le code. Au lieu de mettre toutes les responsabilités au même endroit, on sépare les données, l’affichage et le traitement des demandes. Nous allons suivre le même exemple d’articles pour voir le rôle de chaque partie. »

---

## Diapositive 2 — Le Model (Modèle)

Le modèle représente les données manipulées par l’application. Avec Laravel, un modèle Eloquent facilite la lecture et la modification des enregistrements dans la base de données.

**`app/Models/Article.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
}
```

- `Article` est le modèle d’un article.
- Par convention, Laravel associe ce modèle à la table `articles`.
- Eloquent permet ensuite d’effectuer des opérations sur les enregistrements, par exemple récupérer tous les articles avec `Article::all()`.

## Notes pour l’oral

« Le modèle décrit ici l’objet Article. Laravel s’appuie sur Eloquent pour relier ce modèle aux données stockées dans la table articles. Le contrôleur pourra lui demander les articles, sans avoir à écrire lui-même toute la requête SQL. »

---

## Diapositive 3 — La View (Vue)

La vue prépare ce que l’utilisateur voit. Dans Laravel, les vues Blade se trouvent dans `resources/views` et peuvent afficher les données transmises par le contrôleur.

**`resources/views/articles.blade.php`**

```blade
<h1>Liste des articles</h1>

<ul>
    @forelse ($articles as $article)
        <li>
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
        </li>
    @empty
        <li>Aucun article pour le moment.</li>
    @endforelse
</ul>
```

- `@forelse` parcourt la liste et prévoit le cas où elle est vide.
- `{{ $article->title }}` et `{{ $article->content }}` insèrent les valeurs dans le HTML. Blade échappe ces valeurs par défaut avant leur affichage.

## Notes pour l’oral

« La vue s’occupe de l’affichage, pas de la recherche en base de données. Ici, Blade parcourt les articles reçus et construit une liste HTML. Les doubles accolades affichent le titre et le contenu en échappant les caractères spéciaux. »

---

## Diapositive 4 — Le Controller (Contrôleur)

Le contrôleur reçoit une action associée à une route, demande les données nécessaires au modèle, puis choisit la vue et lui transmet ces données.

**Route dans `routes/web.php`**

```php
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/articles', [ArticleController::class, 'index']);
```

**`app/Http/Controllers/ArticleController.php`**

```php
<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::all();

        return view('articles', ['articles' => $articles]);
    }
}
```

1. La route relie `GET /articles` à la méthode `index`.
2. `Article::all()` demande au modèle Eloquent de récupérer les articles.
3. `view('articles', ...)` choisit `articles.blade.php` et lui transmet la liste sous le nom `articles`.

## Notes pour l’oral

« Quand le navigateur demande `/articles`, la route appelle `index`. Le contrôleur demande au modèle tous les articles, puis les transmet à la vue Blade. Le contrôleur coordonne les deux autres composants, mais il ne construit pas lui-même le HTML. »

---

## Diapositive 5 — Fonctionnement global de MVC

### Parcours d’une requête

1. L’utilisateur demande la liste des articles en ouvrant `/articles`.
2. La route Laravel dirige la demande vers le contrôleur.
3. Le contrôleur appelle le modèle, qui récupère les données dans la base.
4. Le contrôleur transmet les articles à la vue.
5. La vue produit le HTML affiché à l’utilisateur.

```text
Utilisateur
    │ GET /articles
    ▼
Route ──► Controller ──► Model ──► Base de données
           ▲              ◄────────── résultats
           │ articles
           └── transmet les articles ──► View (Blade) ── HTML ──► Utilisateur
```

| Composant | Rôle dans l’exemple |
| --- | --- |
| **Model** | Accède aux données des articles avec Eloquent. |
| **View** | Affiche les articles dans une page HTML avec Blade. |
| **Controller** | Coordonne la requête, le modèle et la vue. |

**Conclusion :** MVC aide à séparer les responsabilités. Cette organisation rend l’application plus claire et facilite la modification ou la réutilisation de chaque partie.

**Sources officielles :** [Eloquent](https://laravel.com/docs/13.x/eloquent), [Vues et Blade](https://laravel.com/docs/13.x/views), [Contrôleurs](https://laravel.com/docs/13.x/controllers) et [Cycle de vie d’une requête](https://laravel.com/docs/13.x/lifecycle).

## Notes pour l’oral

« Pour résumer, la route oriente la demande, le contrôleur coordonne le travail, le modèle accède aux données et la vue les affiche. En séparant ces rôles, MVC aide l’équipe à comprendre et à faire évoluer l’application plus facilement. »
