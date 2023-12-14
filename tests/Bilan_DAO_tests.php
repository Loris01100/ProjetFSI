<?php

define('DUMP', true);

require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';

use BO\Bilanun;
use DAO\BilanUnDao;
use BO\Bilandeux;
use DAO\BilanDeuxDao;

$bilanUnDao = new BilanUnDao($pdo);

$bilanDeuxDao = new BilanDeuxDao($pdo);

$dateBilanUn = new \DateTime();
$dateBilanUn->setDate(2023,05,15);

$bilan1 = new Bilanun(1, 15, $dateBilanUn, 14, 14, 'IA');


$bilan2 = new Bilandeux(1, 15, 14, $dateBilanUn, 14, 'IA');


$allBil1 = $bilanUnDao->getAll();
echo "Bilan 1 " . count($allBil1) . " Bilan 1.\n";

$allBil2 = $bilanDeuxDao->getAll();
echo "Bilan 2 " . count($allBil2) . " Bilan 2.\n";


$bil1Id = $bilanUnDao->addBilanUn($bilan1);
echo "Bilan 1 ajouter: $bil1Id\n";

$bil2Id = $bilanDeuxDao->addBilanDeux($bilan2);
echo "Bilan 2 ajouter: $bil1Id\n";

$bilan1->setNoteEts('Updated note');
$bilanUnDao->updateBilanUn($bilan1);
echo "Eleve modifié.\n";

$bilan2->setNoteDossierDeux('Updated note');
$bilanDeuxDao->updateBilanDeux($bilan2);
echo "Eleve modifié.\n";
