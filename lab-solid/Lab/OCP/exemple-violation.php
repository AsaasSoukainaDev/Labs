<?php

declare(strict_types=1);

function calculerRemise(string $typeClient, float $montant): float
{
    if ($typeClient === 'etudiant') {
        return $montant * 0.9;
    }

    if ($typeClient === 'membre') {
        return $montant * 0.95;
    }

    return $montant;
}

echo 'Montant : ' . calculerRemise('etudiant', 100.0) . PHP_EOL;
