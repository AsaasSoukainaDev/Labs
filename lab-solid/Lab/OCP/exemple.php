<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/contracts/DisciplineReaderInterface.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/contracts/DisciplineWriterInterface.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/contracts/InputValidatorInterface.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/models/Discipline.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/services/DisciplineService.php';

class DetailedDisciplineValidator implements InputValidatorInterface
{
    public function validate(array $input): void
    {
        $label = $input['libelle'] ?? '';
        if (!is_string($label) || mb_strlen(trim($label)) < 6) {
            throw new InvalidArgumentException('Le libellé détaillé doit contenir au moins 6 caractères.');
        }

        if (isset($input['description']) && !is_string($input['description'])) {
            throw new InvalidArgumentException('La description doit être une chaîne.');
        }
    }
}

class OcpDisciplineStore implements DisciplineReaderInterface, DisciplineWriterInterface
{
    public function findAll(): array
    {
        return [];
    }

    public function add(Discipline $discipline): bool
    {
        echo 'Discipline ajoutée : ' . $discipline->getLibelle() . PHP_EOL;
        return true;
    }
}

// On ajoute une variante de validation et on la transmet au service existant.
$store = new OcpDisciplineStore();
$service = new DisciplineService($store, $store, new DetailedDisciplineValidator());
$service->ajouterDiscipline(['libelle' => 'Yoga doux', 'description' => 'Souplesse']);
