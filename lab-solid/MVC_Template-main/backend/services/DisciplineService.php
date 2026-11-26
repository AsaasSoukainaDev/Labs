<?php

require_once dirname(__DIR__) . '/contracts/DisciplineReaderInterface.php';
require_once dirname(__DIR__) . '/contracts/DisciplineWriterInterface.php';
require_once dirname(__DIR__) . '/contracts/InputValidatorInterface.php';
require_once dirname(__DIR__) . '/models/Discipline.php';

/** Cas d'usage de consultation et de création des disciplines. */
class DisciplineService
{
    public function __construct(
        private DisciplineReaderInterface $reader,
        private DisciplineWriterInterface $writer,
        private InputValidatorInterface $validator
    ) {
    }

    public function listerDisciplines(): array
    {
        return array_map(
            static fn (Discipline $discipline): array => $discipline->toArray(),
            $this->reader->findAll()
        );
    }

    public function ajouterDiscipline(array $input): array
    {
        $this->validator->validate($input);

        $discipline = new Discipline(
            null,
            trim($input['libelle']),
            trim($input['description'] ?? '')
        );

        if (!$this->writer->add($discipline)) {
            throw new RuntimeException('La discipline n’a pas pu être enregistrée.');
        }

        return ['success' => true, 'message' => 'Discipline ajoutée avec succès'];
    }
}
