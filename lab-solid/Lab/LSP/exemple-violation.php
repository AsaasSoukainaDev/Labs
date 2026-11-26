<?php

declare(strict_types=1);

class Oiseau
{
    public function voler(): string
    {
        return 'L’oiseau vole';
    }
}

class Autruche extends Oiseau
{
    public function voler(): string
    {
        throw new LogicException('Une autruche ne vole pas.');
    }
}

function faireVoler(Oiseau $oiseau): void
{
    echo $oiseau->voler() . PHP_EOL;
}

faireVoler(new Autruche());
