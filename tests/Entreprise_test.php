<?php
define('DUMP', true);

require "../config/globalConfig.php";
require_once '../config/appConfig.php';
require_once '../src/fonctionsUtiles.php';

use BO\Entreprise;
use DAO\EntrerpriseDAO;

$entreprise = new Entreprise(1, "Ort", "Lyon8ème", "69008", "Lyon");
var_dump($entreprise);

$db = connexionBdd($infoBdd);
dump_var($db, DUMP, 'Objet PDO:');

if (!is_null($db)) {

    $repo = new DAO\EntrerpriseDAO($db);
    echo '<h1>Liste des Entreprises</h1>';
    $res = $repo->getAllEntreprise();
    dump_var($res, DUMP, 'résultat:');

    echo '<h1>Ajout Bilan </h1>';
    $tab = array(
        'nomEts' => 'Microsoft France',
        'adresseEts' => 'Paris 4ème',
        'cpEts' => '75002',
        'villeEts' => 'Paris',

    );

    try {
        // Création de la connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=projetfsi', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Création de l'objet UserDAO
        $ets = new EntrerpriseDAO($pdo);

        // Ajout d'un nouvel utilisateur
        $nomEt = "Boulangerie";
        $adrE = "Henri Pensier";
        $cpE = "69105";
        $vilE = "Lyon";
        $isEntreprise = $ets ->addEntreprise($nomEt, $adrE, $cpE, $vilE);

        if ($isEntreprise) {
            echo "Utilisateur ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'utilisateur.";
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }

}

