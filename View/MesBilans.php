<?php
require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';

use BO\Eleve;
use DAO\EleveDAO;

$dsn = "{$infoBdd['type']}:host={$infoBdd['host']};dbname={$infoBdd['dbname']};charset={$infoBdd['charset']}";
$pdo = new PDO($dsn, $infoBdd['user'], $infoBdd['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$eleveDAO = new \DAO\EleveDAO($pdo);
$idEtudiant = isset($_GET['numEtu']) ? (int)$_GET['numEtu'] : null;
$bilanUn = $eleveDAO->getallBilanUnByEtu($idEtudiant);

$bilanDeux = $eleveDAO->getallBilanDeuxByEtu($idEtudiant);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Bilans</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 font-sans">
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-indigo-400">Mes Bilans</h1>

    <div class="flex">
        <?php if ($bilanUn !== null): ?>
            <div class="flex-1 bg-white rounded-md overflow-hidden shadow-md p-6 mr-4 border-l-4 border-blue-400">
                <h2 class="text-2xl font-bold mb-4 text-center text-blue-400">Bilan Un</h2>
                <div class="bilan-details grid grid-cols-2 gap-4">
                    <label class="font-bold mb-2 text-gray-700">Date:</label>
                    <span><?php echo $bilanUn->getDateBilanUn() ? $bilanUn->getDateBilanUn()->format('Y-m-d H:i:s') : 'Non défini'; ?></span>

                    <label class="font-bold mb-2 text-gray-700">Note Entreprise:</label>
                    <span><?php echo $bilanUn->getNoteEts() ?? 'Non défini'; ?></span>

                    <label class="font-bold mb-2 text-gray-700">Note Dossier:</label>
                    <span><?php echo $bilanUn->getNoteDossierUn() ?? 'Non défini'; ?></span>

                    <label class="font-bold mb-2 text-gray-700">Note oral:</label>
                    <span><?php echo $bilanUn->getNoteOralUn() ?? 'Non défini'; ?></span>

                    <label class="font-bold mb-2 text-gray-700">Remarque:</label>
                    <span><?php echo $bilanUn->getRqBilanUn() ?? 'Non défini'; ?></span>
                </div>
            </div>
        <?php else: ?>
            <div class="flex-1 bg-white rounded-md overflow-hidden shadow-md p-6 mr-4 border-l-4 border-blue-300">
                <p class="text-center text-gray-500">Pas de bilan un</p>
            </div>
        <?php endif; ?>

        <?php if ($bilanDeux !== null): ?>
            <div class="flex-1 bg-white rounded-md overflow-hidden shadow-md p-6 ml-4 border-l-4 border-green-400">
                <h2 class="text-2xl font-bold mb-4 text-center text-green-400">Bilan Deux</h2>
                <div class="bilan-details grid grid-cols-2 gap-4">
                    <label class="font-bold mb-2 text-gray-700">Date:</label>
                    <span><?php echo $bilanDeux->getDateBilanDeux() ? $bilanDeux->getDateBilanDeux()->format('Y-m-d H:i:s') : 'Non défini'; ?></span>

                    <label class="font-bold mb-2 text-gray-700">Note Oral:</label>
                    <span><?php echo $bilanDeux->getNoteOralDeux() ?? 'Non défini'; ?></span>

                    <label class="font-bold mb-2 text-gray-700">Note dossier:</label>
                    <span><?php echo $bilanDeux->getNoteDossierDeux() ?? 'Non défini'; ?></span>

                    <label class="font-bold mb-2 text-gray-700">Remarque:</label>
                    <span><?php echo $bilanDeux->getRqBilanDeux() ?? 'Non défini'; ?></span>

                    <label class="font-bold mb-2 text-gray-700">Sujet de mémoire:</label>
                    <span><?php echo $bilanDeux->getSujetMemoire() ?? 'Non défini'; ?></span>
                </div>
            </div>
        <?php else: ?>
            <div class="flex-1 bg-white rounded-md overflow-hidden shadow-md p-6 ml-4 border-l-4 border-green-300">
                <p class="text-center text-gray-500">Pas de bilan deux</p>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>

</html>




