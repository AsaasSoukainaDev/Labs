<?php

declare(strict_types=1);

abstract class ArchitectureBaseService
{
    protected function texteObligatoire(string $texte, string $champ): string
    {
        $texte = trim($texte);

        if ($texte === '') {
            throw new InvalidArgumentException($champ . ' ne peut pas etre vide.');
        }

        return $texte;
    }
}

final class BaseArticleService extends ArchitectureBaseService
{
    public function creerTitre(string $titre): string
    {
        return 'Article : ' . $this->texteObligatoire($titre, 'Le titre');
    }
}

final class BaseCommentaireService extends ArchitectureBaseService
{
    public function creerTexte(string $texte): string
    {
        return 'Commentaire : ' . $this->texteObligatoire($texte, 'Le commentaire');
    }
}

$articleService = new BaseArticleService();
$commentaireService = new BaseCommentaireService();

echo $articleService->creerTitre('BaseService partagee') . PHP_EOL;
echo $commentaireService->creerTexte('Validation commune') . PHP_EOL;