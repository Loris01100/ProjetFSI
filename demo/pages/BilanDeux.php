<?php
require_once "../../config/appConfig.php";
require_once "../../config/globalConfig.php";

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
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informations de l'Étudiant</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="css/style.min.css" rel="stylesheet">
</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin6">
                <a class="navbar-brand ms-4" href="index.html">
                    <b class="logo-icon">
                        <img src="../assets/images/FSI_logo.png" alt="homepage" class="dark-logo" width="30%" />
                    </b>

                </a>
                <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ... -->
            </div>
        </nav>
    </header>
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
            <?php include '../Components/sidebar.php' ?>
        <!-- End Sidebar navigation -->
    </aside>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <!-- ... -->
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app-style-switcher.js"></script>
<script src="js/waves.js"></script>
<script src="js/sidebarmenu.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
