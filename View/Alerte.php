<?php
require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';


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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Alertes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .alert-section {
            margin-top: 20px;
        }

        .alert-heading {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .alert-table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
            border: 2px solid #dee2e6;
            border-radius: 5px;
        }

        .alert-table th, .alert-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .alert-table th {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            border-bottom: 2px solid #dee2e6;
        }
    </style>
</head>
<body class="container">
<div class="alert-section">
    <h1 class="alert-heading">Mes Alertes</h1>

    <div class="row">
        <div class="col-md-6">
            <h2 class="alert-heading">Élèves sans Bilan Un</h2>
            <?php if (!empty($elevesSansBilanUn)) : ?>
                <table class="alert-table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Classe</th>
                        <th>Tuteur</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($elevesSansBilanUn as $eleve) : ?>
                        <tr>
                            <td><?= $eleve->getNomEleve(); ?></td>
                            <td><?= $eleve->getPrenomEleve(); ?></td>
                            <td><?= $eleve->getIdClasse()->getNomClasse(); ?></td>
                            <td><?= $eleve->getNumTuteur()->getNomTuteur();?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p class="alert alert-info">Aucun élève sans Bilan Un trouvé.</p>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <h2 class="alert-heading">Élèves sans Bilan Deux</h2>
            <?php if (!empty($elevesSansBilanDeux)) : ?>
                <table class="alert-table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Classe</th>
                        <th>Tuteur</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($elevesSansBilanDeux as $eleve) : ?>
                        <tr>
                            <td><?= $eleve->getNomEleve(); ?></td>
                            <td><?= $eleve->getPrenomEleve(); ?></td>
                            <td><?= $eleve->getIdClasse()->getNomClasse(); ?></td>
                            <td><?= $eleve->getNumTuteur()->getNomTuteur();?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p class="alert alert-info">Aucun élève sans Bilan Deux trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Ajouter le lien vers Bootstrap JS ici -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
