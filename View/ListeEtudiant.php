<?php
require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';
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
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des élèves</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Liste des élèves</h4>
                </div>
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
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
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
                        // Affichage des résultats dans le tableau HTML
                        if ($results && count($results) > 0) {
                            foreach ($results as $items) {
                                ?>
                                <tr>
                                    <td><?= $items['nomEtu']; ?></td>
                                    <td><?= $items['preEtu']; ?></td>
                                    <td><?= $items['mailEtu']; ?></td>
                                    <td><?= $items['nomClasse']; ?></td>
                                    <td><?= $items['nomSpe']; ?></td>
                                    <td><a href="DétailEtudiant.php?id=<?= $items['numEtu']; ?>">Consulter</a></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7">Aucun étudiant trouvé</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
