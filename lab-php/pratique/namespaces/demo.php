<?php

declare(strict_types=1);

require __DIR__ . '/app/Models/Article.php';
require __DIR__ . '/app/Repositories/ArticleRepository.php';

use App\Repositories\ArticleRepository;

$depot = new ArticleRepository();
$article = $depot->trouver(1);

if ($article === null) {
    echo "Article introuvable." . PHP_EOL;
    exit(0);
}

echo $article->titre . PHP_EOL;