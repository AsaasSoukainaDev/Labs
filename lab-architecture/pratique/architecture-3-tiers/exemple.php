<?php

declare(strict_types=1);

final readonly class TierArticle
{
    public function __construct(public int $id, public string $titre)
    {
    }
}

interface TierArticleSource
{
    public function tous(): array;
}

final class TierArticleDAO implements TierArticleSource
{
    public function tous(): array
    {
        return [
            new TierArticle(1, 'Organiser le code'),
            new TierArticle(2, 'Separer les responsabilites'),
        ];
    }
}

final class TierArticleService
{
    public function __construct(private TierArticleSource $source)
    {
    }

    public function titres(): array
    {
        return array_map(
            static fn (TierArticle $article): string => $article->titre,
            $this->source->tous()
        );
    }
}

final class TierArticlePresentation
{
    public function afficher(array $titres): void
    {
        echo "Articles :" . PHP_EOL;

        foreach ($titres as $titre) {
            echo '- ' . $titre . PHP_EOL;
        }
    }
}

$source = new TierArticleDAO();
$service = new TierArticleService($source);
$presentation = new TierArticlePresentation();
$presentation->afficher($service->titres());