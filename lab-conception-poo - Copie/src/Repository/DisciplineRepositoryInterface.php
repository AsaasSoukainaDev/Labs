<?php

namespace App\Repository;

use App\Entity\Discipline;

/**
 * Interface définissant le contrat de persistance pour les disciplines.
 * Respecte le principe d'inversion des dépendances (DIP) et la ségrégation des interfaces (ISP).
 */
interface DisciplineRepositoryInterface
{
    /**
     * Récupère l'ensemble des disciplines enregistrées.
     *
     * @return Discipline[]
     */
    public function findAll(): array;

    /**
     * Recherche une discipline par son identifiant unique.
     */
    public function findById(string $id): ?Discipline;

    /**
     * Sauvegarde ou met à jour une discipline.
     */
    public function save(Discipline $discipline): void;
}
