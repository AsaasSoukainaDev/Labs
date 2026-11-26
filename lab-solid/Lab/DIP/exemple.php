<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/models/DisciplineDAO.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/services/DisciplineInputValidator.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/services/DisciplineService.php';

class DemoDisciplineStore implements DisciplineReaderInterface, DisciplineWriterInterface
{
    public function findAll(): array
    {
        return [];
    }

    public function add(Discipline $discipline): bool
    {
        echo 'Ajout en mémoire : ' . $discipline->getLibelle() . PHP_EOL;
        return true;
    }
}

// Le point de composition injecte les dépendances au service réel.
$store = new DemoDisciplineStore();
$validator = new DisciplineInputValidator();
$service = new DisciplineService($store, $store, $validator);

echo json_encode(
    $service->ajouterDiscipline(['libelle' => 'Cardio', 'description' => 'Endurance']),
    JSON_UNESCAPED_UNICODE
) . PHP_EOL;
