<?php
define('DUMP', true);

require_once '../config/appConfig.php';
require_once '../src/fonctionsUtiles.php';

use BO\Classe;
use DAO\ClasseDao;

$bilan = new Classe(1, "2SIO");
var_dump($bilan);

$db = connexionBdd($infoBdd);
dump_var($db, DUMP, 'Objet PDO:');

if (!is_null($db)) {

    $repo = new DAO\ClasseDao($db);
    echo '<h1>Liste des Classe</h1>';
    $res = $repo->getAllClasse();
    dump_var($res, DUMP, 'résultat:');


}

