<?php
require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';

use BO\Tuteur;
use DAO\TuteurDAO;
use BO\Eleve;
use DAO\EleveDAO;

$dsn = "{$infoBdd['type']}:host={$infoBdd['host']};dbname={$infoBdd['dbname']};charset={$infoBdd['charset']}";
$pdo = new PDO($dsn, $infoBdd['user'], $infoBdd['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Instancier la classe EleveDAO
$eleveDAO = new \DAO\EleveDAO($pdo);

// Appeler la méthode getAllelevesSansBilanUn
$elevesSansBilanUn = $eleveDAO->getAllelevesSansBilanUn();
$elevesSansBilanDeux = $eleveDAO->getAllelevesSansBilanDeux();
$tuteurEcoleDAO = new TuteurDAO($pdo);

// ID du tuteur à récupérer
$idTuteur = 1; // Remplacez par l'ID que vous souhaitez tester

// Appeler la méthode getById
$tuteur = $tuteurEcoleDAO->getById($idTuteur);

// Afficher les résultats
if ($tuteur) {
    echo "Tuteur trouvé : " . $tuteur->getNomTuteur() . " " . $tuteur->getPrenomTuteur();
} else {
    echo "Aucun tuteur trouvé avec l'ID : " . $idTuteur;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
    <!-- Ajouter le lien vers Bootstrap CSS ici -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Résultats de la méthode getAllelevesSansBilanUn</h2>

    <?php if (!empty($elevesSansBilanUn)) : ?>
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Numéro de l'Élève</th>
                <th scope="col">Nom de l'Élève</th>
                <th scope="col">Prénom de l'Élève</th>
                <th scope="col">Mail de l'Élève</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($elevesSansBilanUn as $eleve) : ?>
                <tr>
                    <td><?= $eleve->getIdEleve(); ?></td>
                    <td><?= $eleve->getNomEleve(); ?></td>
                    <td><?= $eleve->getPrenomEleve(); ?></td>
                    <td><?= $eleve->getMailEleve(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="alert alert-info mt-3">Aucun élève sans BilanUn trouvé.</p>
    <?php endif; ?>
</div>
<h2>Résultats de la méthode getAllelevesSansBilanDeux</h2>

<?php if (!empty($elevesSansBilanDeux)) : ?>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col">Numéro de l'Élève</th>
            <th scope="col">Nom de l'Élève</th>
            <th scope="col">Prénom de l'Élève</th>
            <th scope="col">Mail de l'Élève</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($elevesSansBilanDeux as $eleve) : ?>
            <tr>
                <td><?= $eleve->getIdEleve(); ?></td>
                <td><?= $eleve->getNomEleve(); ?></td>
                <td><?= $eleve->getPrenomEleve(); ?></td>
                <td><?= $eleve->getMailEleve(); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="mt-3">Aucun élève sans BilanDeux trouvé.</p>
<?php endif; ?>>
<!-- Ajouter le lien vers Bootstrap JS ici -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>



