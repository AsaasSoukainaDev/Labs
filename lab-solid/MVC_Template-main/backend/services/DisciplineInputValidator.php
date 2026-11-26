<?php

require_once dirname(__DIR__) . '/contracts/InputValidatorInterface.php';

/** Validation des entrées propres à la création d'une discipline. */
class DisciplineInputValidator implements InputValidatorInterface
{
    public function validate(array $input): void
    {
        $libelle = $input['libelle'] ?? null;
        $description = $input['description'] ?? '';

        if (!is_string($libelle) || mb_strlen(trim($libelle)) < 4) {
            throw new InvalidArgumentException('Le libellé doit contenir au moins 4 caractères.');
        }

        if (!is_string($description)) {
            throw new InvalidArgumentException('La description doit être une chaîne de caractères.');
        }
    }
}
