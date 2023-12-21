<?php
define('DUMP', true);

require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';


use BO\Classe;
use DAO\ClasseDao;

$classe = new Classe(1, "2SIO");

$classeDao = new ClasseDao($pdo);

$allCla = $classeDao->getAll();
echo "Classe " . count($allCla) . " Classe.\n";

$classeId = $classeDao->addClasse($classe);
echo "Classe ajouter : $classeId\n";

