<?php

require_once dirname(__DIR__) . '/contracts/DisciplineReaderInterface.php';
require_once dirname(__DIR__) . '/contracts/DisciplineWriterInterface.php';
require_once __DIR__ . '/Discipline.php';
require_once dirname(__DIR__) . '/config/Database.php';

/** Adaptateur PDO : requêtes SQL et conversion des lignes en entités. */
class DisciplineDAO implements DisciplineReaderInterface, DisciplineWriterInterface
{
    public function __construct(private ?PDO $db = null)
    {
    }

    private function connection(): PDO
    {
        return $this->db ??= Database::getConnection();
    }

    public function findAll(): array
    {
        $rows = $this->connection()
            ->query('SELECT id_discipline, libelle, description FROM discipline ORDER BY id_discipline ASC')
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            static fn (array $row): Discipline => new Discipline(
                (int) $row['id_discipline'],
                (string) $row['libelle'],
                (string) ($row['description'] ?? '')
            ),
            $rows
        );
    }

    public function add(Discipline $discipline): bool
    {
        $statement = $this->connection()->prepare(
            'INSERT INTO discipline (libelle, description, id_science)
             SELECT :libelle, :description, id_science
             FROM science
             ORDER BY id_science ASC
             LIMIT 1'
        );

        $executed = $statement->execute([
            'libelle' => $discipline->getLibelle(),
            'description' => $discipline->getDescription(),
        ]);

        return $executed && $statement->rowCount() === 1;
    }
}
