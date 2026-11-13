<?php

require_once __DIR__ . '/../src/autoload.php';

use App\Repository\JsonDisciplineRepository;
use App\Service\DisciplineService;

// Initialisation des couches POO
$dataFile = __DIR__ . '/../data/disciplines.json';
$repository = new JsonDisciplineRepository($dataFile);
$service = new DisciplineService($repository);

$messageSucces = null;
$messageErreur = null;

// Traitement du formulaire d'ajout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'ajouter') {
    $nom = trim($_POST['nom'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $capacite = (int)($_POST['capacite'] ?? 0);

    try {
        $nouvelleDiscipline = $service->ajouterDiscipline($nom, $description, $capacite);
        $messageSucces = "La discipline « " . htmlspecialchars($nouvelleDiscipline->getNom()) . " » a été ajoutée avec succès !";
    } catch (\Throwable $e) {
        $messageErreur = $e->getMessage();
    }
}

// Récupération de la liste des disciplines
$disciplines = $service->listerDisciplines();
$totalDisciplines = count($disciplines);
?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Salle de Sport - Conception POO</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            navy: '#172033',
                            teal: '#0F766E',
                            turquoise: '#14B8A6',
                            orange: '#F97316'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-full flex flex-col text-slate-800 antialiased">

    <!-- En-tête -->
    <header class="bg-brand-navy text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <span class="inline-block px-2.5 py-0.5 rounded text-xs font-semibold uppercase tracking-wider bg-brand-teal text-teal-100 mb-2">
                        Lab Conception POO
                    </span>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                        Salle de Sport - Gestion des Disciplines
                    </h1>
                    <p class="text-slate-300 text-sm mt-1">
                        Application démonstrative conçue avec les principes de la Conception Orientée Objet en PHP.
                    </p>
                </div>
                <div class="flex items-center gap-2 self-start md:self-auto bg-slate-800/80 px-4 py-2 rounded-lg border border-slate-700">
                    <span class="h-3 w-3 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-xs text-slate-200 font-medium"><?= $totalDisciplines ?> discipline(s) active(s)</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Messages flash -->
        <?php if ($messageSucces): ?>
            <div class="mb-6 p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-sm font-medium"><?= $messageSucces ?></div>
            </div>
        <?php endif; ?>

        <?php if ($messageErreur): ?>
            <div class="mb-6 p-4 rounded-lg bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 text-rose-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-sm font-medium"><?= htmlspecialchars($messageErreur) ?></div>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Colonne 1 : Formulaire d'ajout -->
            <section class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 sticky top-6">
                    <h2 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-3 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Ajouter une discipline
                    </h2>

                    <form action="index.php" method="POST" class="space-y-4">
                        <input type="hidden" name="action" value="ajouter">

                        <div>
                            <label for="nom" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                Nom de la discipline <span class="text-rose-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="nom"
                                name="nom"
                                required
                                placeholder="Ex: Crossfit, Natation, Judo"
                                class="w-full px-3.5 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-teal focus:border-transparent transition"
                            >
                        </div>

                        <div>
                            <label for="capacite" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                Capacité maximale (personnes) <span class="text-rose-500">*</span>
                            </label>
                            <input
                                type="number"
                                id="capacite"
                                name="capacite"
                                required
                                min="1"
                                max="100"
                                value="15"
                                class="w-full px-3.5 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-teal focus:border-transparent transition"
                            >
                        </div>

                        <div>
                            <label for="description" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                Description détaillée <span class="text-rose-500">*</span>
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                                required
                                placeholder="Objectifs, niveau requis, déroulement de la séance..."
                                class="w-full px-3.5 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-teal focus:border-transparent transition"
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-brand-teal hover:bg-teal-700 text-white font-semibold text-sm transition shadow-sm hover:shadow"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Enregistrer la discipline
                        </button>
                    </form>

                    <!-- Rappel architecture POO -->
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Conception appliquée :</h3>
                        <ul class="text-xs text-slate-600 space-y-1.5">
                            <li class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-teal"></span>
                                <strong>Entité :</strong> Discipline (Encapsulation)
                            </li>
                            <li class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-turquoise"></span>
                                <strong>Repository :</strong> Interface DIP / OCP
                            </li>
                            <li class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-orange"></span>
                                <strong>Service :</strong> Validation métier (SRP)
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Colonne 2 & 3 : Liste des disciplines -->
            <section class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Disciplines enregistrées</h2>
                            <p class="text-xs text-slate-500">Liste des activités disponibles dans la salle</p>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-700 rounded-full">
                            Total : <?= $totalDisciplines ?>
                        </span>
                    </div>

                    <?php if (empty($disciplines)): ?>
                        <div class="text-center py-12 px-4 border-2 border-dashed border-slate-200 rounded-lg">
                            <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-semibold text-slate-800">Aucune discipline</h3>
                            <p class="mt-1 text-xs text-slate-500">Commencez par ajouter votre première discipline sportive ci-contre.</p>
                        </div>
                    <?php else: ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php foreach ($disciplines as $d): ?>
                                <article class="border border-slate-200 hover:border-brand-turquoise/60 transition-all rounded-lg p-5 bg-gradient-to-br from-white to-slate-50 shadow-sm flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-start justify-between gap-2 mb-2">
                                            <h3 class="text-base font-bold text-slate-900"><?= htmlspecialchars($d->getNom()) ?></h3>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-teal-50 text-brand-teal border border-teal-200">
                                                <?= $d->getCapaciteMax() ?> places
                                            </span>
                                        </div>
                                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                            <?= nl2br(htmlspecialchars($d->getDescription())) ?>
                                        </p>
                                    </div>
                                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
                                        <span>Réf : <?= htmlspecialchars($d->getId()) ?></span>
                                        <span class="text-brand-teal font-medium">Statut : Actif</span>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        </div>
    </main>

    <!-- Pied de page -->
    <footer class="bg-white border-t border-slate-200 mt-12 py-6 text-center text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4">
            <p><strong>lab-conception-poo</strong> — Application de démonstration en PHP & Tailwind CSS.</p>
            <p class="mt-1">Modélisation UML, Découplage (DIP), Responsabilité Unique (SRP) & Encapsulation.</p>
        </div>
    </footer>

</body>
</html>
