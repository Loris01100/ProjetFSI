<?php
require_once '../../config/appConfig.php';
require_once '../../config/globalConfig.php';
use DAO\EleveDAO;
use BO\Eleve;

try {
    // Créez une instance de PDO en utilisant les informations de la configuration
    $dsn = "{$infoBdd['type']}:host={$infoBdd['host']};dbname={$infoBdd['dbname']};charset={$infoBdd['charset']}";
    $pdo = new PDO($dsn, $infoBdd['user'], $infoBdd['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Créez une instance de la DAO EleveDAO en lui passant la connexion PDO
    $eleveDAO = new EleveDAO($pdo);

    $results = [];

    if (isset($_GET['Rechercher'])) {
        $filtervalues = $_GET['Rechercher'];
        $results = $eleveDAO->getListeEtu($filtervalues);
    }

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des élèves</title>
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
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des élèves</li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Liste des élèves</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="Rechercher" required value="<?php if(isset($_GET['Rechercher'])){echo $_GET['Rechercher']; } ?>" class="form-control" placeholder="Rechercher">
                                            <button type="submit" class="btn btn-primary">Rechercher</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Mail</th>
                                    <th>Classe</th>
                                    <th>Spécialisation</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($results && count($results) > 0) {
                                    foreach ($results as $items) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($items['nomEtu']) . "</td>";
                                        echo "<td>" . htmlspecialchars($items['preEtu']) . "</td>";
                                        echo "<td>" . htmlspecialchars($items['mailEtu']) . "</td>";
                                        echo "<td>" . htmlspecialchars($items['nomClasse']) . "</td>";
                                        echo "<td>" . htmlspecialchars($items['nomSpe']) . "</td>";
                                        echo "<td><a href='DétailEtudiant.php?id=" . htmlspecialchars($items['numEtu']) . "'>Consulter</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>Aucun étudiant trouvé</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
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
</div>
</body>
</html>
