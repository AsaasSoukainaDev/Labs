<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/models/DisciplineDAO.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/services/DisciplineInputValidator.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/services/DisciplineService.php';

/** Adaptateur en mémoire substituable au DAO PDO pour cet exercice. */
class InMemoryDisciplineStore implements DisciplineReaderInterface, DisciplineWriterInterface
{
    public function __construct(private array $disciplines = [])
    {
    }

    public function findAll(): array
    {
        return $this->disciplines;
    }

    public function add(Discipline $discipline): bool
    {
        $this->disciplines[] = $discipline;
        return true;
    }
}

$store = new InMemoryDisciplineStore([
    new Discipline(1, 'Yoga', 'Discipline relaxante'),
]);
$service = new DisciplineService($store, $store, new DisciplineInputValidator());

echo json_encode($service->listerDisciplines(), JSON_UNESCAPED_UNICODE) . PHP_EOL;
$service->ajouterDiscipline(['libelle' => 'Cardio', 'description' => 'Endurance']);
echo json_encode($service->listerDisciplines(), JSON_UNESCAPED_UNICODE) . PHP_EOL;
