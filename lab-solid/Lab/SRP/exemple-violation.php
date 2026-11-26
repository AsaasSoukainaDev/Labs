<?php

declare(strict_types=1);

class Facture
{
    public function total(float $prix, int $quantite): float
    {
        return $prix * $quantite;
    }

    public function afficher(float $total): void
    {
        echo 'Total de la facture : ' . $total . PHP_EOL;
    }
}

$facture = new Facture();
$facture->afficher($facture->total(12.5, 2));
