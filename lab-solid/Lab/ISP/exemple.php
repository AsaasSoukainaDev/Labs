<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/contracts/DisciplineReaderInterface.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/contracts/DisciplineWriterInterface.php';
require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/models/Discipline.php';

class ReadOnlyDisciplineCatalog implements DisciplineReaderInterface
{
    public function findAll(): array
    {
        return [new Discipline(1, 'Yoga', 'Discipline relaxante')];
    }
}

class WriteOnlyDisciplineCatalog implements DisciplineWriterInterface
{
    public function add(Discipline $discipline): bool
    {
        echo 'Création demandée : ' . $discipline->getLibelle() . PHP_EOL;
        return true;
    }
}

function afficherCatalogue(DisciplineReaderInterface $reader): void
{
    foreach ($reader->findAll() as $discipline) {
        echo $discipline->getLibelle() . PHP_EOL;
    }
}

function creerDiscipline(DisciplineWriterInterface $writer): void
{
    $writer->add(new Discipline(null, 'Cardio', 'Endurance'));
}

afficherCatalogue(new ReadOnlyDisciplineCatalog());
creerDiscipline(new WriteOnlyDisciplineCatalog());
