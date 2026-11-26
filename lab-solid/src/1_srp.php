<?php
declare(strict_types=1);

namespace Solid\Srp;

use InvalidArgumentException;

/*
 * SRP : une classe doit avoir une seule raison de changer.
 * Fonctionnalité du projet : ajouter / lister des disciplines (règle : libellé >= 4 caractères).
 */

// ---------------------------------------------------------------------------
// AVANT : une seule classe valide, stocke et formate la réponse JSON.
// (Même défaut que DisciplineController, qui lit la requête, appelle le service,
//  encode le JSON et traduit les exceptions en codes HTTP.)
// ---------------------------------------------------------------------------
final class DisciplineToutEnUn
{
    private array $lignes = [];

    public function ajouter(string $libelle, string $description): string
    {
        if (mb_strlen(trim($libelle)) < 4) {
            return json_encode(
                ['success' => false, 'message' => 'Le libellé doit contenir au moins 4 caractères'],
                JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
            );
        }

        $this->lignes[] = [
            'id_discipline' => count($this->lignes) + 1,
            'libelle'       => $libelle,
            'description'   => $description,
        ];

        return json_encode(
            ['success' => true, 'message' => 'Discipline ajoutée avec succès'],
            JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
        );
    }

    public function lister(): string
    {
        return json_encode($this->lignes, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    }
}

// ---------------------------------------------------------------------------
// APRÈS : une responsabilité par classe.
// ---------------------------------------------------------------------------

/** Responsabilité : les règles de validation. */
final class DisciplineValidator
{
    public function validerLibelle(string $libelle): void
    {
        if (mb_strlen(trim($libelle)) < 4) {
            throw new InvalidArgumentException('Le libellé doit contenir au moins 4 caractères');
        }
    }
}

/** Responsabilité : le stockage (ici en mémoire, à la place de la table discipline). */
final class DisciplineRepository
{
    private array $lignes = [];

    public function ajouter(string $libelle, string $description): void
    {
        $this->lignes[] = [
            'id_discipline' => count($this->lignes) + 1,
            'libelle'       => $libelle,
            'description'   => $description,
        ];
    }

    public function tous(): array
    {
        return $this->lignes;
    }
}

/** Responsabilité : le format de la réponse (JSON). */
final class DisciplineJsonPresenter
{
    public function succes(string $message): string
    {
        return $this->encoder(['success' => true, 'message' => $message]);
    }

    public function erreur(string $message): string
    {
        return $this->encoder(['success' => false, 'message' => $message]);
    }

    public function liste(array $disciplines): string
    {
        return $this->encoder($disciplines);
    }

    private function encoder(array $donnees): string
    {
        return json_encode($donnees, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    }
}

/** Responsabilité : orchestrer le cas d'usage. */
final class DisciplineService
{
    public function __construct(
        private DisciplineValidator $validator,
        private DisciplineRepository $repository,
        private DisciplineJsonPresenter $presenter
    ) {
    }

    public function ajouter(string $libelle, string $description): string
    {
        try {
            $this->validator->validerLibelle($libelle);
            $this->repository->ajouter($libelle, $description);
            return $this->presenter->succes('Discipline ajoutée avec succès');
        } catch (InvalidArgumentException $e) {
            return $this->presenter->erreur($e->getMessage());
        }
    }

    public function lister(): string
    {
        return $this->presenter->liste($this->repository->tous());
    }
}
