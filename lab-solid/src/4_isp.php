<?php
declare(strict_types=1);

namespace Solid\Isp;

use BadMethodCallException;
use InvalidArgumentException;

/*
 * ISP : aucune classe ne doit dépendre de méthodes qu'elle n'utilise pas.
 * Fonctionnalités du projet : GET (lister) et POST (ajouter) n'ont pas les mêmes besoins.
 * Le projet n'a pas d'interface : dès qu'on en écrit une "complète", le problème apparaît.
 */

// ---------------------------------------------------------------------------
// AVANT : une interface "fourre-tout".
// ---------------------------------------------------------------------------
interface DisciplineDAOComplet
{
    public function afficherTous(): array;
    public function ajouter(string $libelle, string $description): bool;
    public function modifier(int $id, string $libelle, string $description): bool;
    public function supprimer(int $id): bool;
}

/** Une source en lecture seule est obligée d'implémenter (et de refuser) 3 méthodes. */
final class DisciplineLectureSeuleAvant implements DisciplineDAOComplet
{
    public function __construct(private array $lignes)
    {
    }

    public function afficherTous(): array
    {
        return $this->lignes;
    }

    public function ajouter(string $libelle, string $description): bool
    {
        throw new BadMethodCallException('Lecture seule : ajouter() non supporté');
    }

    public function modifier(int $id, string $libelle, string $description): bool
    {
        throw new BadMethodCallException('Lecture seule : modifier() non supporté');
    }

    public function supprimer(int $id): bool
    {
        throw new BadMethodCallException('Lecture seule : supprimer() non supporté');
    }
}

// ---------------------------------------------------------------------------
// APRÈS : des interfaces petites, selon l'usage.
// ---------------------------------------------------------------------------
interface DisciplineLecteur
{
    public function afficherTous(): array;
}

interface DisciplineEcrivain
{
    public function ajouter(string $libelle, string $description): bool;
}

/** Cas d'usage GET : ne connaît que la lecture. */
final class ListeDisciplinesService
{
    public function __construct(private DisciplineLecteur $lecteur)
    {
    }

    public function lister(): array
    {
        return array_map(function (array $row): array {
            return [
                'id_discipline' => (int) $row['id_discipline'],
                'libelle'       => $row['libelle'],
                'description'   => $row['description'],
            ];
        }, $this->lecteur->afficherTous());
    }
}

/** Cas d'usage POST : ne connaît que l'écriture. */
final class AjoutDisciplineService
{
    public function __construct(private DisciplineEcrivain $ecrivain)
    {
    }

    public function ajouter(array $input): array
    {
        $libelle     = $input['libelle'] ?? '';
        $description = $input['description'] ?? '';

        if (mb_strlen(trim($libelle)) < 4) {
            throw new InvalidArgumentException('Le libellé doit contenir au moins 4 caractères');
        }

        $this->ecrivain->ajouter($libelle, $description);

        return ['success' => true, 'message' => 'Discipline ajoutée avec succès'];
    }
}

/** Une classe peut implémenter les deux petites interfaces si elle sait tout faire. */
final class DisciplineDAOMemoire implements DisciplineLecteur, DisciplineEcrivain
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
