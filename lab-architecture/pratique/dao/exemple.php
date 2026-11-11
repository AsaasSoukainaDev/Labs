<?php

declare(strict_types=1);

final readonly class DaoArticle
{
    public function __construct(public int $id, public string $titre)
    {
    }
}

final class InMemoryArticleDAO
{
    private array $articles = [];

    public function enregistrer(DaoArticle $article): void
    {
        $this->articles[$article->id] = $article;
    }

    public function trouver(int $id): ?DaoArticle
    {
        return $this->articles[$id] ?? null;
    }
}

$dao = new InMemoryArticleDAO();
$dao->enregistrer(new DaoArticle(1, 'Decouvrir le DAO'));
$article = $dao->trouver(1);

echo $article?->titre ?? 'Article introuvable.';
echo PHP_EOL;