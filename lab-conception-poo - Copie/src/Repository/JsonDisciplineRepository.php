<?php

namespace App\Repository;

use App\Entity\Discipline;
use RuntimeException;

/**
 * Implémentation du dépôt stockant les disciplines dans un fichier JSON.
 * Respecte le principe de responsabilité unique (SRP) : gérer le stockage sur fichier.
 */
class JsonDisciplineRepository implements DisciplineRepositoryInterface
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->ensureFileExists();
    }

    /**
     * @return Discipline[]
     */
    public function findAll(): array
    {
        $data = $this->loadRawData();
        $disciplines = [];

        foreach ($data as $item) {
            if (is_array($item)) {
                $disciplines[] = Discipline::fromArray($item);
            }
        }

        return $disciplines;
    }

    public function findById(string $id): ?Discipline
    {
        $disciplines = $this->findAll();
        foreach ($disciplines as $discipline) {
            if ($discipline->getId() === $id) {
                return $discipline;
            }
        }
        return null;
    }

    public function save(Discipline $discipline): void
    {
        $disciplines = $this->findAll();
        $foundIndex = null;

        foreach ($disciplines as $index => $existing) {
            if ($existing->getId() === $discipline->getId()) {
                $foundIndex = $index;
                break;
            }
        }

        if ($foundIndex !== null) {
            $disciplines[$foundIndex] = $discipline;
        } else {
            $disciplines[] = $discipline;
        }

        $this->persistAll($disciplines);
    }

    /**
     * @param Discipline[] $disciplines
     */
    private function persistAll(array $disciplines): void
    {
        $raw = array_map(fn(Discipline $d) => $d->toArray(), $disciplines);
        $json = json_encode($raw, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        if ($json === false) {
            throw new RuntimeException("Erreur lors de l'encodage JSON des disciplines.");
        }

        if (file_put_contents($this->filePath, $json) === false) {
            throw new RuntimeException("Impossible d'écrire dans le fichier : {$this->filePath}");
        }
    }

    private function loadRawData(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $content = file_get_contents($this->filePath);
        if ($content === false || trim($content) === '') {
            return [];
        }

        $data = json_decode($content, true);
        return is_array($data) ? $data : [];
    }

    private function ensureFileExists(): void
    {
        $dir = dirname($this->filePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([], JSON_PRETTY_PRINT));
        }
    }
}
