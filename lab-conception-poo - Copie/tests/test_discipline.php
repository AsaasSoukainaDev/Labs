<?php

require_once __DIR__ . '/../src/autoload.php';

use App\Entity\Discipline;
use App\Repository\JsonDisciplineRepository;
use App\Service\DisciplineService;

echo "=== DÉBUT DES TESTS : lab-conception-poo ===\n\n";

$testsPasses = 0;
$testsTotal = 0;

function assertTest(bool $condition, string $message): void {
    global $testsPasses, $testsTotal;
    $testsTotal++;
    if ($condition) {
        echo " [OK] " . $message . "\n";
        $testsPasses++;
    } else {
        echo " [FAIL] " . $message . "\n";
    }
}

// 1. Test de l'entité Discipline
echo "1. Tests de l'Entité Discipline\n";
try {
    $d = new Discipline("Natation", "Séance de natation libre ou encadrée", 12);
    assertTest($d->getNom() === "Natation", "Le nom de la discipline est correctement initialisé");
    assertTest($d->getCapaciteMax() === 12, "La capacité maximale est correcte");
    assertTest(!empty($d->getId()), "L'identifiant unique est généré");
} catch (\Throwable $e) {
    assertTest(false, "Exception inattendue lors de la création d'une discipline valide : " . $e->getMessage());
}

// Test validation nom vide
try {
    new Discipline("", "Description", 10);
    assertTest(false, "Le nom vide aurait dû lever une InvalidArgumentException");
} catch (\InvalidArgumentException $e) {
    assertTest(true, "Validation réussie : refus d'un nom vide");
}

// Test validation capacité invalide
try {
    new Discipline("Judo", "Description", 0);
    assertTest(false, "La capacité de 0 aurait dû lever une InvalidArgumentException");
} catch (\InvalidArgumentException $e) {
    assertTest(true, "Validation réussie : refus d'une capacité <= 0");
}

// 2. Test du Dépôt (Repository) avec fichier temporaire
echo "\n2. Tests du Repository (JsonDisciplineRepository)\n";
$tempFile = __DIR__ . '/temp_test_disciplines.json';
if (file_exists($tempFile)) {
    unlink($tempFile);
}

$repo = new JsonDisciplineRepository($tempFile);
assertTest(count($repo->findAll()) === 0, "Le repository initial est vide");

$disciplineTest = new Discipline("Escalade", "Initiation et perfectionnement sur mur", 8, "test_1");
$repo->save($disciplineTest);

$liste = $repo->findAll();
assertTest(count($liste) === 1, "Une discipline a bien été enregistrée");
assertTest($liste[0]->getNom() === "Escalade", "Le nom récupéré correspond à l'entité sauvegardée");

$trouve = $repo->findById("test_1");
assertTest($trouve !== null && $trouve->getNom() === "Escalade", "Recherche par ID fonctionnelle");

// 3. Test du Service (DisciplineService)
echo "\n3. Tests du Service Métier (DisciplineService)\n";
$service = new DisciplineService($repo);

$service->ajouterDiscipline("Zumba", "Danse fitness dynamique", 25);
$nouvelleListe = $service->listerDisciplines();
assertTest(count($nouvelleListe) === 2, "La discipline a bien été ajoutée via le service");

// Test doublon
try {
    $service->ajouterDiscipline("zumba", "Autre zumba", 20);
    assertTest(false, "L'ajout d'une discipline avec un nom existant aurait dû échouer");
} catch (\InvalidArgumentException $e) {
    assertTest(true, "Le service refuse correctement les doublons de nom");
}

// Nettoyage du fichier temporaire
if (file_exists($tempFile)) {
    unlink($tempFile);
}

echo "\n============================================\n";
echo "RÉSULTAT FINAL : $testsPasses / $testsTotal tests réussis avec succès !\n";
echo "============================================\n";

if ($testsPasses !== $testsTotal) {
    exit(1);
}
