<?php

require_once dirname(__DIR__) . '/models/DisciplineDAO.php';
require_once dirname(__DIR__) . '/services/DisciplineInputValidator.php';
require_once dirname(__DIR__) . '/services/DisciplineService.php';
require_once dirname(__DIR__) . '/controllers/DisciplineController.php';

// Composition root : les détails concrets sont assemblés à la frontière HTTP.
$dao = new DisciplineDAO();
$validator = new DisciplineInputValidator();
$service = new DisciplineService($dao, $dao, $validator);
$controller = new DisciplineController($service);

$controller->handleRequest();
