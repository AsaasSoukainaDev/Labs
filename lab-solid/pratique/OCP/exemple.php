<?php
declare(strict_types=1);

namespace Solid\Ocp;

use InvalidArgumentException;

/*
 * OCP : ouvert à l'extension, fermé à la modification.
 * Fonctionnalité du projet : valider le libellé d'une discipline
 * (BaseService::validateLibelle ne contient aujourd'hui qu'une règle, écrite en dur).
 */

// ---------------------------------------------------------------------------
// AVANT : pour ajouter une règle, il faut MODIFIER cette méthode.
// ---------------------------------------------------------------------------
final class ValidateurAvant
{
    public function valider(string $libelle): void
    {
        if (mb_strlen(trim($libelle)) < 4) {
            throw new InvalidArgumentException('Le libellé doit contenir au moins 4 caractères');
        }
        // Règle "maximum 50 caractères" ? "sans chiffres" ? -> modifier ici, au risque de tout casser.
    }
}

// ---------------------------------------------------------------------------
// APRÈS : chaque règle est une classe. Le validateur ne change plus jamais.
// ---------------------------------------------------------------------------
interface RegleValidation
{
    public function valider(string $libelle): void;
}

final class LongueurMinimale implements RegleValidation
{
    public function __construct(private int $min)
    {
    }

    public function valider(string $libelle): void
    {
        if (mb_strlen(trim($libelle)) < $this->min) {
            throw new InvalidArgumentException("Le libellé doit contenir au moins {$this->min} caractères");
        }
    }
}

/** 50 correspond à libelle VARCHAR(50) dans database.sql. */
final class LongueurMaximale implements RegleValidation
{
    public function __construct(private int $max)
    {
    }

    public function valider(string $libelle): void
    {
        if (mb_strlen(trim($libelle)) > $this->max) {
            throw new InvalidArgumentException("Le libellé doit contenir au plus {$this->max} caractères");
        }
    }
}

final class SansChiffres implements RegleValidation
{
    public function valider(string $libelle): void
    {
        if (preg_match('/\d/', $libelle) === 1) {
            throw new InvalidArgumentException('Le libellé ne doit pas contenir de chiffres');
        }
    }
}

final class ValidateurLibelle
{
    /** @param RegleValidation[] $regles */
    public function __construct(private array $regles)
    {
    }

    public function valider(string $libelle): void
    {
        foreach ($this->regles as $regle) {
            $regle->valider($libelle);
        }
    }
}

echo "=== AVANT : la règle est codée dans le validateur ===" . PHP_EOL;
$validatorBefore = new ValidateurAvant();
try {
    $validatorBefore->valider('Yoga');
    echo "Yoga accepté." . PHP_EOL;
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

echo "=== APRÈS : règles composables ===" . PHP_EOL;
$validator = new ValidateurLibelle([
    new LongueurMinimale(4),
    new LongueurMaximale(50),
    new SansChiffres(),
]);

foreach (['Yoga', str_repeat('A', 51), 'Cardio2'] as $libelle) {
    try {
        $validator->valider($libelle);
        echo $libelle . ' : accepté.' . PHP_EOL;
    } catch (InvalidArgumentException $exception) {
        echo $libelle . ' : ' . $exception->getMessage() . PHP_EOL;
    }
}
