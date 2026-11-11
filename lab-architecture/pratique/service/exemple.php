<?php

declare(strict_types=1);

final readonly class ServiceArticle
{
    public function __construct(public int $id, public string $titre)
    {
    }
}

final class ServiceArticleDAO
{
    private array $articles = [];

    public function enregistrer(ServiceArticle $article): void
    {
        $this->articles[$article->id] = $article;
    }

    public function tous(): array
    {
        return array_values($this->articles);
    }
}

final class PublicationService
{
    public function __construct(private ServiceArticleDAO $dao)
    {
    }

    public function publier(string $titre): ServiceArticle
    {
        $titre = trim($titre);

        if ($titre === '') {
            throw new InvalidArgumentException('Le titre ne peut pas etre vide.');
        }

        $article = new ServiceArticle(count($this->dao->tous()) + 1, $titre);
        $this->dao->enregistrer($article);

        return $article;
    }
}

$service = new PublicationService(new ServiceArticleDAO());
$article = $service->publier('Comprendre les services');

echo 'Article publie : ' . $article->titre . PHP_EOL;