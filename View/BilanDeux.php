<?php
require_once "../config/appConfig.php";
require_once "../config/globalConfig.php";

use DAO\EleveDAO;
use DAO\BilanDeuxDao;

$eleveDAO = new EleveDAO($pdo);
$bilanDeuxDAO = new BilanDeuxDao($pdo);

$idEtudiant = isset($_GET['numEtu']) ? (int)$_GET['numEtu'] : null;

if ($idEtudiant) {
    $etudiant = $eleveDAO->read($idEtudiant);
    $bilanDeux = $eleveDAO->getallBilanDeuxByEtu($idEtudiant);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations de l'Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-10">
    <?php if ($idEtudiant && $etudiant && $bilanDeux): ?>
        <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Informations de l'étudiant</h1>
            <p><strong>Nom :</strong> <?= htmlspecialchars($etudiant->getNomEleve()) ?></p>
            <p><strong>Prénom :</strong> <?= htmlspecialchars($etudiant->getPrenomEleve()) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($etudiant->getMailEleve()) ?></p>
            <hr class="my-6 border-gray-300">
            <h2 class="text-xl font-bold text-gray-800 mb-3">Bilan Deux :</h2>
            <p><strong>Note Dossier Deux :</strong> <?= htmlspecialchars($bilanDeux->getNoteDossierDeux()) ?></p>
            <p><strong>Date Bilan Deux :</strong> <?= htmlspecialchars($bilanDeux->getDateBilanDeux()->format('d/m/Y H:i')) ?></p>
            <p><strong>Note Orale Deux :</strong> <?= htmlspecialchars($bilanDeux->getNoteOralDeux()) ?></p>
            <p><strong>Remarques Deux :</strong> <?= nl2br(htmlspecialchars($bilanDeux->getRqBilanDeux())) ?></p>
            <p><strong>Sujet Mémoire :</strong> <?= htmlspecialchars($bilanDeux->getSujetMemoire()) ?></p>
        </div>
    <?php else: ?>
        <div class="flex justify-center">
            <p class="text-xl text-red-500">Aucune information disponible pour l'étudiant spécifié.</p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
