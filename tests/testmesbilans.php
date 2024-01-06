<?php
require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';

use BO\Eleve;
use DAO\EleveDAO;
use BO\Bilanun;

$dsn = "{$infoBdd['type']}:host={$infoBdd['host']};dbname={$infoBdd['dbname']};charset={$infoBdd['charset']}";
$pdo = new PDO($dsn, $infoBdd['user'], $infoBdd['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Inclure vos fichiers et classes nécessaires ici

// Instancier votre EtudiantDAO (ajustez le chemin et le nom de la classe selon votre structure)
$etudiantDAO = new EleveDAO( $pdo); // Assurez-vous de passer votre instance PDO ici

// Appeler la fonction getallBilanUnByEtu avec un identifiant d'étudiant
$idEleve = 20; // Remplacez cela par l'identifiant réel de l'étudiant que vous souhaitez tester
$bilanUn = $etudiantDAO->getallBilanUnByEtu($idEleve);

// Vérifier si le bilan a été récupéré avec succès
if ($bilanUn) {
    // Afficher les détails du bilan (ajustez cela selon votre structure)
    echo "Note Ets: " . $bilanUn->getNoteEts() . "<br>";
    echo "Date Bilan Un: " . $bilanUn->getDateBilanUn()->format('Y-m-d H:i:s') . "<br>";
    echo "Note Dossier Un: " . $bilanUn->getNoteDossierUn() . "<br>";
    echo "Note Oral Un: " . $bilanUn->getNoteOralUn() . "<br>";
    echo "Remarque Bilan Un: " . $bilanUn->getRqBilanUn() . "<br>";
} else {
    echo "Aucun bilan trouvé pour l'étudiant avec l'ID $idEleve.";
}

$bilanDeux = $etudiantDAO->getallBilanDeuxByEtu($idEleve);

if ($bilanDeux !== null) {
    // Afficher les détails du bilan (ajustez cela selon votre structure)

    echo "ID Bilan Deux: " . $bilanDeux->getIdBilanDeux() . "<br>";

    // Vérifier et afficher la note oral deux
    echo "Note Oral Deux: " . ($bilanDeux->getNoteOralDeux() !== null ? $bilanDeux->getNoteOralDeux() : "Non défini") . "<br>";

    // Vérifier et afficher la note dossier deux
    echo "Note Dossier Deux: " . ($bilanDeux->getNoteDossierDeux() !== null ? $bilanDeux->getNoteDossierDeux() : "Non défini") . "<br>";

    // Vérifier et afficher la date bilan deux
    echo "Date Bilan Deux: " . ($bilanDeux->getDateBilanDeux() !== null ? $bilanDeux->getDateBilanDeux()->format('Y-m-d H:i:s') : "Non définie") . "<br>";

    // Vérifier et afficher la remarque bilan deux
    echo "Remarque Bilan Deux: " . ($bilanDeux->getRqBilanDeux() !== null ? $bilanDeux->getRqBilanDeux() : "Non définie") . "<br>";

    // Vérifier et afficher le sujet mémoire
    echo "Sujet Mémoire: " . ($bilanDeux->getSujetMemoire() !== null ? $bilanDeux->getSujetMemoire() : "Non défini") . "<br>";
} else {
    echo "Aucun bilan trouvé pour l'ID $idEleve ou le bilan est null.";
}
