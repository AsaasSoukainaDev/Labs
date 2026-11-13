<?php

namespace App\Entity;

use InvalidArgumentException;

/**
 * Entité représentant une Discipline sportive au sein de la salle de sport.
 * Responsabilité : porter les données et garantir la cohérence de l'état de la discipline.
 */
class Discipline
{
    private string $id;
    private string $nom;
    private string $description;
    private int $capaciteMax;

    public function __construct(string $nom, string $description, int $capaciteMax, ?string $id = null)
    {
        $this->setId($id ?? uniqid('disc_', true));
        $this->setNom($nom);
        $this->setDescription($description);
        $this->setCapaciteMax($capaciteMax);
    }

    public function getId(): string
    {
        return $this->id;
    }

    private function setId(string $id): void
    {
        $this->id = trim($id);
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $nomNettoye = trim($nom);
        if (empty($nomNettoye)) {
            throw new InvalidArgumentException("Le nom de la discipline ne peut pas être vide.");
        }
        if (mb_strlen($nomNettoye) < 2) {
            throw new InvalidArgumentException("Le nom de la discipline doit contenir au moins 2 caractères.");
        }
        $this->nom = $nomNettoye;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $descNettoyee = trim($description);
        if (empty($descNettoyee)) {
            throw new InvalidArgumentException("La description ne peut pas être vide.");
        }
        $this->description = $descNettoyee;
    }

    public function getCapaciteMax(): int
    {
        return $this->capaciteMax;
    }

    public function setCapaciteMax(int $capaciteMax): void
    {
        if ($capaciteMax <= 0) {
            throw new InvalidArgumentException("La capacité maximale doit être supérieure à zéro.");
        }
        $this->capaciteMax = $capaciteMax;
    }

    /**
     * Sérialise l'entité sous forme de tableau associatif.
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'description' => $this->description,
            'capaciteMax' => $this->capaciteMax,
        ];
    }

    /**
     * Crée une instance de Discipline à partir d'un tableau de données.
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['nom'] ?? '',
            $data['description'] ?? '',
            (int)($data['capaciteMax'] ?? 10),
            $data['id'] ?? null
        );
    }
}
