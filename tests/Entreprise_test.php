<?php
require_once "../config/globalConfig.php";
require_once '../config/appConfig.php';

use BO\Entreprise;
use DAO\EntrerpriseDAO;

$entrepriseDao = new EntrerpriseDAO($pdo);

$entreprise = new Entreprise(4, 'ORT', 'LYON8ème', "69008", 'Lyon');


$entrepriseId = $entrepriseDao->addEntreprise($entreprise);
echo "Entreprise: $entrepriseId\n";

$entreprise->setCpEts('69009');
$entrepriseDao->updateEntrerpise($entreprise);
echo "Eleve modifié.\n";

$allEts = $entrepriseDao->getAll();
echo "Entreprise " . count($allEts) . " Entreprise.\n";


$entrepriseDao->deleteEts($entrepriseId);
echo "Eleve supprimé.\n";