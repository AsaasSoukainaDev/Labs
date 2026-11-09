<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Article;

final class ArticleRepository
{
    public function trouver(int $id): ?Article
    {
        if ($id !== 1) {
            return null;
        }

        return new Article('Decouvrir les namespaces');
    }
}