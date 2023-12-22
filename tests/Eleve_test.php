<?php

require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';


use BO\Eleve;
use DAO\EleveDAO;


$eleveDAO = new EleveDAO($pdo);


$eleve = new Eleve(3, 'Winny', "L'Ourson", 1234567890, 'dsqdsd@dsqd.com', 'MielPops');




$eleveId = $eleveDAO->addEleve($eleve);
echo "Eleve: $eleveId\n";


$allEleves = $eleveDAO->getAll();
echo "Eleve " . count($allEleves) . " eleves.\n";


$eleve->setNomEleve('Updated Name');
$eleveDAO->updateEleve($eleve);
echo "Eleve modifié.\n";


