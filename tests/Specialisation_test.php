<?php
define('DUMP', true);

require "../config/globalConfig.php";
require "../config/appConfig.php";
require_once '../src/fonctionsUtiles.php';

use BO\Specialisation;
use DAO\SpecialisationDAO;

$section = new Specialisation(1, "SIO");
var_dump($section);

$db = connexionBdd($infoBdd);
dump_var($db, DUMP, 'Objet PDO:');

if (!is_null($db)) {

    $repo = new DAO\SpecialisationDAO($db);
    echo '<h1>Liste des Sections</h1>';
    $res = $repo->getAllSpecialisation();
    dump_var($res, DUMP, 'résultat:');
}