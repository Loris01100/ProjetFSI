<?php
require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';

use BO\Tuteur;
use DAO\TuteurDAO;
use BO\Eleve;
use DAO\EleveDAO;
use BO\Classe;
use DAO\ClasseDao;

$dsn = "{$infoBdd['type']}:host={$infoBdd['host']};dbname={$infoBdd['dbname']};charset={$infoBdd['charset']}";
$pdo = new PDO($dsn, $infoBdd['user'], $infoBdd['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Instancier la classe EleveDAO
$eleveDAO = new \DAO\EleveDAO($pdo);

/*// Appeler la méthode getAllelevesSansBilanUn
$elevesSansBilanUn = $eleveDAO->getAllelevesSansBilanUn();
$elevesSansBilanDeux = $eleveDAO->getAllelevesSansBilanDeux();*/
$tuteurEcoleDAO = new TuteurDAO($pdo);

// ID du tuteur à récupérer
$idTuteur = 1; // Remplacez par l'ID que vous souhaitez tester

// Appeler la méthode getById
$tuteur = $tuteurEcoleDAO->read($idTuteur);

// Afficher les résultats
if ($tuteur) {
    echo "Tuteur trouvé : " . $tuteur->getNomTuteur() . " " . $tuteur->getPrenomTuteur();
} else {
    echo "Aucun tuteur trouvé avec l'ID : " . $idTuteur;
}

$classedao = new ClasseDao($pdo);
$idclasse = 1;
$laclasse = $classedao->getById($idclasse);
var_dump($laclasse);


?>





