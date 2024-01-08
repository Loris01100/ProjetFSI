<?php
require_once "../config/appConfig.php";
require_once "../config/globalConfig.php";

use DAO\EleveDAO;
use DAO\BilanUnDao;
use BO\Bilanun;

$eleveDAO = new EleveDAO($pdo);


$idEtudiant = isset($_GET['numEtu']) ? (int)$_GET['numEtu'] : null;

if ($idEtudiant) {

    $etudiant = $eleveDAO->read($idEtudiant);
    $bilanUn = $eleveDAO->getallBilanUnByEtu($idEtudiant);
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
    <?php if ($idEtudiant && $etudiant && $bilanUn): ?>
        <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Informations de l'étudiant</h1>
            <div class="mb-3">
                <span class="font-semibold text-gray-600">Nom :</span>
                <span class="text-gray-700"><?= htmlspecialchars($etudiant->getNomEleve()) ?></span>
            </div>
            <div class="mb-3">
                <span class="font-semibold text-gray-600">Prénom :</span>
                <span class="text-gray-700"><?= htmlspecialchars($etudiant->getPrenomEleve()) ?></span>
            </div>
            <div class="mb-3">
                <span class="font-semibold text-gray-600">Email :</span>
                <span class="text-gray-700"><?= htmlspecialchars($etudiant->getMailEleve()) ?></span>
            </div>
            <hr class="my-6 border-gray-300">
            <h2 class="text-xl font-bold text-gray-800 mb-3">Bilan :</h2>
            <div class="mb-3">
                <span class="font-semibold text-gray-600">Note ETS :</span>
                <span class="text-gray-700"><?= htmlspecialchars($bilanUn->getNoteEts()) ?></span>
            </div>
            <div class="mb-3">
                <span class="font-semibold text-gray-600">Date Bilan :</span>
                <span class="text-gray-700"><?= htmlspecialchars($bilanUn->getDateBilanUn()->format('d/m/Y H:i')) ?></span>
            </div>
            <div class="mb-3">
                <span class="font-semibold text-gray-600">Note Dossier :</span>
                <span class="text-gray-700"><?= htmlspecialchars($bilanUn->getNoteDossierUn()) ?></span>
            </div>
            <div class="mb-3">
                <span class="font-semibold text-gray-600">Note Orale :</span>
                <span class="text-gray-700"><?= htmlspecialchars($bilanUn->getNoteOralUn()) ?></span>
            </div>
            <div class="mb-3">
                <span class="font-semibold text-gray-600">Remarques :</span>
                <p class="text-gray-700 whitespace-pre-wrap"><?= htmlspecialchars($bilanUn->getRqBilanUn()) ?></p>
            </div>
        </div>
    <?php else: ?>
        <div class="flex justify-center">
            <p class="text-xl text-red-500">Aucune information disponible pour l'étudiant spécifié.</p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>