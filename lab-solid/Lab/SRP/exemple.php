<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/MVC_Template-main/backend/models/Discipline.php';

// L'entité représente les données; elle ne se connecte pas à PDO.
$discipline = new Discipline(3, 'Cardio', 'Exercices cardiovasculaires');
echo json_encode($discipline->toArray(), JSON_UNESCAPED_UNICODE) . PHP_EOL;
