<?php

declare(strict_types=1);

abstract class FormatArticle
{
    abstract public function formater(string $titre): string;
}

final class FormatTexte extends FormatArticle
{
    public function formater(string $titre): string
    {
        return 'Article : ' . $titre;
    }
}

final class FormatHtml extends FormatArticle
{
    public function formater(string $titre): string
    {
        return '<h1>' . htmlspecialchars($titre, ENT_QUOTES, 'UTF-8') . '</h1>';
    }
}

function afficherArticle(FormatArticle $format, string $titre): void
{
    echo $format->formater($titre) . PHP_EOL;
}

afficherArticle(new FormatTexte(), 'Le polymorphisme');
afficherArticle(new FormatHtml(), 'Le polymorphisme');