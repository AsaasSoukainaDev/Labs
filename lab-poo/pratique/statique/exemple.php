<?php

declare(strict_types=1);

final class Article
{
    private static int $nombreCree = 0;

    public function __construct(public readonly string $titre)
    {
        self::$nombreCree++;
    }

    public static function nombreCree(): int
    {
        return self::$nombreCree;
    }
}

new Article('Premier article');
new Article('Deuxieme article');

echo 'Nombre d articles crees : ' . Article::nombreCree() . PHP_EOL;