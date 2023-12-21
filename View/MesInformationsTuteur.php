<?php
require_once "../config/appConfig.php";
require_once "../config/globalConfig.php";

use DAO\TuteurDAO;

$tuteurDAO = new TuteurDAO($pdo);
$idTuteur = 6;
$tuteur = $tuteurDAO->read($idTuteur);
$photo = $tuteur->getCheminPhoto();



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Informations (Tuteur)</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/4 bg-blue-500">
                <img src="../public/images/goudet.png" alt="Photo Tuteur" class="rounded-full w-32 h-32 object-cover mx-auto border-4 border-white">
            </div>
            <div class="md:w-3/4 p-4">
                <h2 class="text-3xl font-semibold mb-2">Informations du Tuteur</h2>
                <p class="text-gray-700"><strong>Nom :</strong> <?php echo $tuteur->getNomTuteur(); ?></p>
                <p class="text-gray-700"><strong>Prénom :</strong> <?php echo $tuteur->getPrenomTuteur(); ?></p>
                <p class="text-gray-700"><strong>Téléphone :</strong> <?php echo $tuteur->getTelTuteur(); ?></p>
                <p class="text-gray-700"><strong>Email :</strong> <?php echo $tuteur->getMailTuteur(); ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

