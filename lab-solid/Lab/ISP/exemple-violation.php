<?php

declare(strict_types=1);

interface EmployeMachine
{
    public function travailler(): string;

    public function prendrePauseRepas(): string;
}

class Robot implements EmployeMachine
{
    public function travailler(): string
    {
        return 'Le robot assemble une pièce';
    }

    public function prendrePauseRepas(): string
    {
        throw new LogicException('Un robot ne prend pas de repas.');
    }
}

echo (new Robot())->travailler() . PHP_EOL;
