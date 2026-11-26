<?php

/** Entité métier sans responsabilité de persistance. */
class Discipline
{
    public function __construct(
        private ?int $id_discipline = null,
        private string $libelle = '',
        private string $description = ''
    ) {
    }

    public function getIdDiscipline(): ?int
    {
        return $this->id_discipline;
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
            'id_discipline' => $this->id_discipline,
            'libelle' => $this->libelle,
            'description' => $this->description,
        ];
    }
}
