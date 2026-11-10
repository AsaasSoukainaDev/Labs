<?php

declare(strict_types=1);

abstract class Contenu
{
    public function __construct(protected string $titre)
    {
    }

    abstract public function decrire(): string;
}

final class Article extends Contenu
{
    public function decrire(): string
    {
        return 'Article : ' . $this->titre;
    }
}

echo (new Article('Les classes abstraites'))->decrire() . PHP_EOL;