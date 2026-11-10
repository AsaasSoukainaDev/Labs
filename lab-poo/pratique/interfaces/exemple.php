<?php

declare(strict_types=1);

interface Publiable
{
    public function publier(): string;
}

final class Article implements Publiable
{
    public function __construct(private string $titre)
    {
    }

    public function publier(): string
    {
        return 'Article publie : ' . $this->titre;
    }
}

function publierContenu(Publiable $contenu): void
{
    echo $contenu->publier() . PHP_EOL;
}

publierContenu(new Article('Les interfaces'));