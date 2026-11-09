---
marp: true
paginate: true
---
# Laravel : installation et « Hello World »

## 1 : Objectif

- Configurer l'environnement de développement
- Installer Laravel
- Afficher « Hello World » avec une **route** et une **vue**

**Oral :** « Nous allons installer Laravel et afficher notre première page en trois étapes simples. »

---

## 2 : Configurer l'environnement

Outils nécessaires :

- **PHP** (version récente, selon la documentation Laravel)
- **Composer** : le gestionnaire de dépendances PHP
- Un éditeur de code (par exemple VS Code)

Vérification dans le terminal :

```bash
php -v
composer -V
```

**Oral :** « Il faut d'abord PHP et Composer. Ces deux commandes vérifient qu'ils sont bien installés. »

---

## 3 : Installer Laravel

```bash
composer create-project laravel/laravel hello-laravel
cd hello-laravel
php artisan serve
```

- Le projet est créé dans le dossier `hello-laravel`
- Le site est accessible sur `http://127.0.0.1:8000`

**Oral :** « Composer crée le projet, puis Artisan lance un serveur local de développement. »

---

## 4 : Créer la vue

Fichier : `resources/views/hello.blade.php`

```html
<h1>Hello World</h1>
```

**Oral :** « La vue contient ce qui sera affiché dans le navigateur. »

---

## 5 : Créer la route

Fichier : `routes/web.php`

```php
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('hello');
});
```

- La route associe l'adresse `/hello` à la vue `hello`

**Oral :** « La route indique à Laravel quelle vue renvoyer quand on visite /hello. »

---

## 6 : Résultat

- Ouvrir `http://127.0.0.1:8000/hello`
- La page affiche **Hello World**

**Conclusion :** une route + une vue suffisent pour afficher une première page avec Laravel.

**Source :** [laravel.com/docs](https://laravel.com/docs)

**Oral :** « Notre première page fonctionne. Merci de votre attention. »
