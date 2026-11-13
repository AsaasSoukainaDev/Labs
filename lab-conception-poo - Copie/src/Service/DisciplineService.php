<?php

namespace App\Service;

use App\Entity\Discipline;
use App\Repository\DisciplineRepositoryInterface;
use InvalidArgumentException;

/**
 * Service métier orchestrant la gestion des disciplines sportives.
 * Responsabilités : valider les règles applicatives et coordonner la persistance.
 * Dépend de l'abstraction DisciplineRepositoryInterface (DIP).
 */
class DisciplineService
{
    private DisciplineRepositoryInterface $repository;

    public function __construct(DisciplineRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Ajoute une nouvelle discipline sportive après validation métier.
     *
     * @throws InvalidArgumentException en cas de données invalides ou de doublon
     */
    public function ajouterDiscipline(string $nom, string $description, int $capaciteMax): Discipline
    {
        $nom = trim($nom);

        if ($this->existeDejaParNom($nom)) {
            throw new InvalidArgumentException("Une discipline portant le nom '{$nom}' existe déjà.");
        }

        $discipline = new Discipline($nom, $description, $capaciteMax);
        $this->repository->save($discipline);

        return $discipline;
    }

    /**
     * Récupère la liste de toutes les disciplines.
     *
     * @return Discipline[]
     */
    public function listerDisciplines(): array
    {
        $disciplines = $this->repository->findAll();

        // Tri alphabétique par nom pour un affichage soigné
        usort($disciplines, fn(Discipline $a, Discipline $b) => strcasecmp($a->getNom(), $b->getNom()));

        return $disciplines;
    }

    /**
     * Vérifie si une discipline avec le même nom existe déjà.
     */
    public function existeDejaParNom(string $nom): bool
    {
        $disciplines = $this->repository->findAll();
        foreach ($disciplines as $d) {
            if (mb_strtolower($d->getNom()) === mb_strtolower(trim($nom))) {
                return true;
            }
        }
        return false;
    }
}
