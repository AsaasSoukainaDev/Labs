<?php
declare(strict_types=1);

namespace Solid\Lsp;

use LogicException;

/*
 * LSP : un sous-type doit pouvoir remplacer son type de base sans casser le programme.
 * Défaut du projet : Discipline (l'entité) hérite de DisciplineDAO (l'accès aux données).
 * Une discipline "EST" une donnée métier, pas un DAO.
 */

// ---------------------------------------------------------------------------
// AVANT
// ---------------------------------------------------------------------------
class DisciplineDAOAvant
{
    protected array $lignes = [];

    public function ajouter(string $libelle, string $description): bool
    {
        $this->lignes[] = ['libelle' => $libelle, 'description' => $description];
        return true;
    }

    public function afficherTous(): array
    {
        return $this->lignes;
    }
}

/** Sous-classe qui refuse une opération du parent : elle casse le contrat. */
final class DisciplineArchiveAvant extends DisciplineDAOAvant
{
    public function ajouter(string $libelle, string $description): bool
    {
        throw new LogicException('Archive en lecture seule');
    }
}

/** Comme dans le projet : l'entité hérite du DAO. */
final class DisciplineEntiteAvant extends DisciplineDAOAvant
{
    public function __construct(private string $libelle)
    {
    }
}

function importerAvant(DisciplineDAOAvant $dao, array $libelles): int
{
    $nombre = 0;
    foreach ($libelles as $libelle) {
        if ($dao->ajouter($libelle, '')) {
            $nombre++;
        }
    }
    return $nombre;
}

// ---------------------------------------------------------------------------
// APRÈS : contrats explicites, l'entité n'hérite plus de rien.
// ---------------------------------------------------------------------------
interface DisciplineLecture
{
    public function afficherTous(): array;
}

interface DisciplineStockage extends DisciplineLecture
{
    public function ajouter(string $libelle, string $description): bool;
}

final class StockageMemoire implements DisciplineStockage
{
    private array $lignes = [];

    public function ajouter(string $libelle, string $description): bool
    {
        $this->lignes[] = [
            'id_discipline' => count($this->lignes) + 1,
            'libelle'       => $libelle,
            'description'   => $description,
        ];
        return true;
    }

    public function afficherTous(): array
    {
        return $this->lignes;
    }
}

/** Substituable à StockageMemoire : mêmes promesses, plus un journal. */
final class StockageJournalise implements DisciplineStockage
{
    private array $journal = [];

    public function __construct(private DisciplineStockage $interne)
    {
    }

    public function ajouter(string $libelle, string $description): bool
    {
        $this->journal[] = "ajout : {$libelle}";
        return $this->interne->ajouter($libelle, $description);
    }

    public function afficherTous(): array
    {
        return $this->interne->afficherTous();
    }

    public function journal(): array
    {
        return $this->journal;
    }
}

/** Lecture seule : n'implémente que DisciplineLecture, donc ne promet pas d'ajouter. */
final class ArchiveDisciplines implements DisciplineLecture
{
    public function __construct(private array $lignes)
    {
    }

    public function afficherTous(): array
    {
        return $this->lignes;
    }
}

/** L'entité : plus aucun lien avec l'accès aux données. */
final class Discipline
{
    public function __construct(
        private ?int $idDiscipline = null,
        private string $libelle = '',
        private string $description = ''
    ) {
    }

    public function getIdDiscipline(): ?int
    {
        return $this->idDiscipline;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
            'id_discipline' => $this->idDiscipline,
            'libelle'       => $this->libelle,
            'description'   => $this->description,
        ];
    }
}

function importer(DisciplineStockage $stockage, array $libelles): int
{
    $nombre = 0;
    foreach ($libelles as $libelle) {
        if ($stockage->ajouter($libelle, '')) {
            $nombre++;
        }
    }
    return $nombre;
}
