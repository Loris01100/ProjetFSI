<?php

define('DUMP', true);

require_once '../config/appConfig.php';
require_once '../src/fonctionsUtiles.php';

use BO\Bilanun;
use DAO\BilanUnDao;
use BO\Bilandeux;
use DAO\BilanDeuxDao;

$bilanUnDao = new BilanUnDao($pdo);

$bilanDeuxDao = new BilanDeuxDao($pdo);

$bilan1 = new Bilanun(1, 15, 14, 14, 14, 'IA');


$bilan2 = new Bilandeux(1, 15, 14, 14, 14, 'IA');

$allBil1 = $bilanUnDao->getAll();
echo "Bilan 1 " . count($allBil1) . " Bilan 1.\n";

$allBil2 = $bilanDeuxDao->getAll();
echo "Bilan 2 " . count($allBil2) . " Bilan 2.\n";

<<<<<<< Updated upstream
if (!is_null($db)) {

    $repo = new DAO\BilanUnDao($db);
    echo '<h1>Liste des Bilans 1</h1>';
    $res = $repo->getAllBilanun();
    dump_var($res, DUMP, 'résultat:');

    $repo = new DAO\BilanDeuxDao($db);
    echo '<h1>Liste des Bilans 2</h1>';
    $res = $repo->getAllBilandeux();
    dump_var($res, DUMP, 'résultat:');

    try {

        $pdo = new PDO('mysql:host=localhost;dbname=projetfsi', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $Bilandeuxdao = new BilanDeuxDao($pdo);


        $noteO = "Nouvel Utilisateur";
        $noteD = "nouvel@example.com";
        $dateB = "25 JANVIER 2023";
        $rqB = "Très bon";
        $sM = "IA";
        $isBilandeuxadd = $Bilandeuxdao->addBilanDeux($noteO, $noteD, $dateB, $rqB, $sM);

        if ($isBilandeuxadd) {
            echo "Utilisateur ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'utilisateur.";
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
=======
$bilan1Id = $bilanUnDao->addBilanUn($bilan1);
echo "Entreprise: $bilan1Id\n";
>>>>>>> Stashed changes
