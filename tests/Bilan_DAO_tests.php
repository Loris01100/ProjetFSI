<?php

define('DUMP', true);

require_once '../config/appConfig.php';
require_once '../src/fonctionsUtiles.php';

use BO\Bilanun;
use DAO\BilanUnDao;
use BO\Bilandeux;
use DAO\BilanDeuxDao;

$bilan = new Bilanun(1, 15, 14, 14, 14, 'IA');
var_dump($bilan);

$bilan = new Bilandeux(1, 15, 14, 14, 14, 'IA');
var_dump($bilan);




$db = connexionBdd($infoBdd);
dump_var($db, DUMP, 'Objet PDO:');

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
        // Création de la connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=projetfsi', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Création de l'objet UserDAO
        $Bilandeuxdao = new BilanDeuxDao($pdo);

        // Ajout d'un nouvel utilisateur
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
