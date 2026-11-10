<?php

declare(strict_types=1);

final class Article
{
    private string $titre;

    public function __construct(string $titre)
    {
        $this->renommer($titre);
    }

    public function titre(): string
    {
        return $this->titre;
    }

    public function renommer(string $titre): void
    {
        $titre = trim($titre);

        if ($titre === '') {
            throw new InvalidArgumentException('Le titre ne peut pas etre vide.');
        }

        $this->titre = $titre;
    }
}

$article = new Article('Titre protege');
echo $article->titre() . PHP_EOL;
$article->renommer('Nouveau titre');
echo $article->titre() . PHP_EOL;