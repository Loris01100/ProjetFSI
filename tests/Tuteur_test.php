<?php

use BO\Tuteur;
use DAO\TuteurDAO;
use BO\Utilisateur;
use DAO\UtilisateurDAO;
require '../config/globalConfig.php';
require '../config/appConfig.php';

$utilisateurDAO = new UtilisateurDAO($pdo);
$tuteurDAO = new TuteurDAO($pdo);


$nouvelUtilisateur = new Utilisateur(2, 'mdp', '123');



$nouveauTuteur = new Tuteur(2, "mamoune", "123", "nidam", "mamoune", "0669996345", "nidam.mamoune@gmail.com", "NIDAM");


try {
    $pdo->beginTransaction();
    $idTuteur = $tuteurDAO->create($nouveauTuteur);
    $pdo->commit();
    echo "Tuteur créé avec l'ID: $idTuteur\n";
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Erreur de création du tuteur : " . $e->getMessage();
}