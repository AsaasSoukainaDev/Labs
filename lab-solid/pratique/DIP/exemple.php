<?php

declare(strict_types=1);

namespace Solid\Dip;

use InvalidArgumentException;
use PDO;
use RuntimeException;

/*
 * DIP : dépendre d'abstractions plutôt que de classes concrètes.
 * Cet exemple est autonome : les classes utiles de src/5_dip.php sont
 * reproduites ici pour pouvoir le lire et l'exécuter sans fichier inclus.
 */

/** Version AVANT : simulation du DAO concret dépendant de MySQL. */
final class DisciplineDAOConcretAvant
{
    public function afficherTous(): array
    {
        throw new RuntimeException('Connexion MySQL impossible (localhost / salle_sport)');
    }
}

/** Version AVANT : le service construit lui-même sa dépendance concrète. */
final class DisciplineServiceAvant
{
    private DisciplineDAOConcretAvant $model;

    public function __construct()
    {
        $this->model = new DisciplineDAOConcretAvant();
    }

    public function lister(): array
    {
        return $this->model->afficherTous();
    }
}

/** Abstraction décrivant les opérations de stockage nécessaires au service. */
interface DisciplineRepositoryInterface
{
    public function afficherTous(): array;

    public function ajouter(string $libelle, string $description): bool;
}

/** Adaptateur mémoire pour démontrer et vérifier le service sans base. */
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
            'libelle' => $libelle,
            'description' => $description,
        ];

        return true;
    }
}

/** Adaptateur PDO de production; il reçoit la connexion au lieu de la créer. */
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
        $statement = $this->pdo->prepare(
            'INSERT INTO discipline (libelle, description) VALUES (?, ?)'
        );

        return $statement->execute([$libelle, $description]);
    }
}

/** Version APRÈS : service dépendant du contrat, pas d'un DAO concret. */
final class DisciplineService
{
    public function __construct(private DisciplineRepositoryInterface $repository)
    {
    }

    public function listerDisciplines(): array
    {
        return array_map(
            static fn (array $row): array => [
                'id_discipline' => (int) $row['id_discipline'],
                'libelle' => $row['libelle'],
                'description' => $row['description'],
            ],
            $this->repository->afficherTous()
        );
    }

    public function ajouterDiscipline(array $input): array
    {
        $libelle = $input['libelle'] ?? '';
        $description = $input['description'] ?? '';

        if (!is_string($libelle) || mb_strlen(trim($libelle)) < 4) {
            throw new InvalidArgumentException('Le libellé doit contenir au moins 4 caractères.');
        }

        if (!is_string($description)) {
            throw new InvalidArgumentException('La description doit être une chaîne de caractères.');
        }

        $this->repository->ajouter(trim($libelle), trim($description));

        return ['success' => true, 'message' => 'Discipline ajoutée avec succès'];
    }
}

// Démonstration AVANT : l'appel dépend d'un DAO concret et échoue ici.
echo "=== AVANT : dépendance concrète créée dans le service ===" . PHP_EOL;
try {
    (new DisciplineServiceAvant())->lister();
} catch (RuntimeException $exception) {
    echo 'Échec simulé : ' . $exception->getMessage() . PHP_EOL;
}

// Démonstration APRÈS : le point d'entrée choisit puis injecte le dépôt.
echo "=== APRÈS : dépôt injecté par contrat ===" . PHP_EOL;
$repository = new DisciplineRepositoryMemoire();
$service = new DisciplineService($repository);

echo json_encode(
    $service->ajouterDiscipline([
        'libelle' => 'Musculation',
        'description' => 'Renforcement musculaire',
    ]),
    JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
) . PHP_EOL;

echo json_encode(
    $service->listerDisciplines(),
    JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
) . PHP_EOL;
