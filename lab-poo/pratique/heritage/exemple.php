<?php

declare(strict_types=1);

class Document
{
    public function __construct(protected string $titre)
    {
    }

    public function afficherTitre(): string
    {
        return $this->titre;
    }
}

final class Article extends Document
{
    public function __construct(string $titre, private string $auteur)
    {
        parent::__construct($titre);
    }

    public function afficherAuteur(): string
    {
        return $this->auteur;
    }
}

$article = new Article('L heritage en PHP', 'Samira');
echo $article->afficherTitre() . ' - ' . $article->afficherAuteur() . PHP_EOL;