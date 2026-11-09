<?php

declare(strict_types=1);

trait HasTimestamps
{
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    public function initialiserHorodatages(?DateTimeImmutable $moment = null): void
    {
        $moment ??= new DateTimeImmutable();
        $this->createdAt = $moment;
        $this->updatedAt = $moment;
    }

    public function dateCreation(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function dateMiseAJour(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}

final class Article
{
    use HasTimestamps;

    public function __construct(public readonly string $titre)
    {
        $this->initialiserHorodatages();
    }
}

final class Commentaire
{
    use HasTimestamps;

    public function __construct(public readonly string $texte)
    {
        $this->initialiserHorodatages();
    }
}

$article = new Article('Partager une methode avec un trait');
$commentaire = new Commentaire('Exemple de reutilisation');

echo $article->titre . ' - cree le ' . $article->dateCreation()->format('Y-m-d H:i:s') . PHP_EOL;
echo $commentaire->texte . ' - cree le ' . $commentaire->dateCreation()->format('Y-m-d H:i:s') . PHP_EOL;