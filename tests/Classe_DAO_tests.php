<?php
define('DUMP', true);

require_once '../config/appConfig.php';


use BO\Classe;
use DAO\ClasseDao;

$bilan = new Classe(1, "2SIO");

$classeDao = new ClasseDao($pdo);

$allCla = $classeDao->getAll();
echo "Classe " . count($allCla) . " Classe.\n";

