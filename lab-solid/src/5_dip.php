<?php
declare(strict_types=1);

namespace Solid\Dip;

use InvalidArgumentException;
use PDO;
use RuntimeException;

/*
 * DIP : dépendre d'abstractions, pas de classes concrètes.
 * Défauts du projet :
 *   - DisciplineService::__construct() fait "new Discipline()" ;
 *   - DisciplineDAO appelle Database::getConnection() (statique) ;
 *   => impossible de tester ou de changer de base sans modifier ces classes.
 */

// ---------------------------------------------------------------------------
// AVANT
// ---------------------------------------------------------------------------

/** Simule le DAO réel : sans serveur MySQL, il échoue. */
final class DisciplineDAOConcretAvant
{
    public function afficherTous(): array
    {
        throw new RuntimeException('Connexion MySQL impossible (localhost / salle_sport)');
    }
}

final class DisciplineServiceAvant
{
    private DisciplineDAOConcretAvant $model;

    public function __construct()
    {
        $this->model = new DisciplineDAOConcretAvant(); // dépendance créée en dur
    }

    public function lister(): array
    {
        return $this->model->afficherTous();
    }
}

// ---------------------------------------------------------------------------
// APRÈS
// ---------------------------------------------------------------------------
interface DisciplineRepositoryInterface
{
    public function afficherTous(): array;
    public function ajouter(string $libelle, string $description): bool;
}

/** Pour les tests : aucune base nécessaire. */
final class DisciplineRepositoryMemoire implements DisciplineRepositoryInterface
{
    private array $lignes = [];

    public function afficherTous(): array
    {
        return $this->lignes;
    }

    public function ajouter(string $libelle, string $description): bool
    {
        $this->lignes[] = [
            'id_discipline' => count($this->lignes) + 1,
            'libelle'       => $libelle,
            'description'   => $description,
        ];
        return true;
    }
}

/** Pour la production : la connexion PDO est injectée (MySQL, SQLite...). */
final class DisciplineRepositoryPdo implements DisciplineRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function afficherTous(): array
    {
        return $this->pdo
            ->query('SELECT * FROM discipline ORDER BY id_discipline ASC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouter(string $libelle, string $description): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO discipline (libelle, description) VALUES (?, ?)');
        return $stmt->execute([$libelle, $description]);
    }
}

final class DisciplineService
{
    public function __construct(private DisciplineRepositoryInterface $repository)
    {
    }

    public function listerDisciplines(): array
    {
        return array_map(function (array $row): array {
            return [
                'id_discipline' => (int) $row['id_discipline'],
                'libelle'       => $row['libelle'],
                'description'   => $row['description'],
            ];
        }, $this->repository->afficherTous());
    }

    public function ajouterDiscipline(array $input): array
    {
        $libelle     = $input['libelle'] ?? '';
        $description = $input['description'] ?? '';

        if (mb_strlen(trim($libelle)) < 4) {
            throw new InvalidArgumentException('Le libellé doit contenir au moins 4 caractères');
        }

        $this->repository->ajouter($libelle, $description);

        return ['success' => true, 'message' => 'Discipline ajoutée avec succès'];
    }
}
