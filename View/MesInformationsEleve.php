<?php
require_once "../config/appConfig.php";
require_once "../config/globalConfig.php";

use DAO\EleveDAO;

$etudiantDAO = new EleveDAO($pdo);
$idEtudiant = 6;
$etudiant = $etudiantDAO->read($idEtudiant);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Informations (Élève)</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/4 bg-blue-500">
                <img src="../public/images/img.png" alt="Photo Élève" class="rounded-full w-32 h-32 object-cover mx-auto border-4 border-white">
            </div>
            <div class="md:w-3/4 p-4">
                <h2 class="text-3xl font-semibold mb-2">Informations de l'Élève</h2>
                <p class="text-gray-700"><strong>Nom :</strong> <?php echo $etudiant->getNomEleve(); ?></p>
                <p class="text-gray-700"><strong>Prénom :</strong> <?php echo $etudiant->getPrenomEleve(); ?></p>
                <p class="text-gray-700"><strong>Email :</strong> <?php echo $etudiant->getMailEleve(); ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

