<?php

require_once '../config/appConfig.php';
use DAO\EleveDAO;

?>

<!doctype html>
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
                            <th>Prenom</th>
                            <th>Classe</th>
                            <th>Bilan 1</th>
                            <th>Bilan 2</th>
                            <th>Spécialisation</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        try {
                            $dsn = "{$infoBdd['type']}:host={$infoBdd['host']};dbname={$infoBdd['dbname']};charset={$infoBdd['charset']}";
                            $pdo = new PDO($dsn, $infoBdd['user'], $infoBdd['pass']);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            if(isset($_GET['Rechercher'])) {
                                $filtervalues = $_GET['Rechercher'];
                                $query = $query = "SELECT Etudiant.nomEtu, Etudiant.preEtu, Classe.nomClasse, bilanun.rqBilanUn, bilandeux.rqBilanDeux, Specialisation.nomSpe 
          FROM Etudiant 
          INNER JOIN Classe ON Etudiant.idClasse = Classe.idClasse 
          LEFT JOIN bilanun ON Etudiant.idBilanUn = bilanun.idBilanUn 
          LEFT JOIN bilandeux ON Etudiant.idBilanDeux = bilandeux.idBilanDeux 
          INNER JOIN Specialisation ON Etudiant.idSpe = Specialisation.idSpe 
          WHERE CONCAT(
              COALESCE(Etudiant.nomEtu, ''),
              COALESCE(Etudiant.preEtu, ''),
              COALESCE(Etudiant.idClasse, ''),
              COALESCE(Classe.nomClasse, ''),
              COALESCE(bilanun.rqBilanUn, ''),
              COALESCE(bilandeux.rqBilanDeux, ''),
              COALESCE(Specialisation.nomSpe, '')
          ) LIKE ?";

                                $statement = $pdo->prepare($query);
                                $statement->execute(["%$filtervalues%"]);
                                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                                if ($results && count($results) > 0) {
                                    foreach ($results as $items) {
                                        ?>
                                        <tr>
                                            <td><?= $items['nomEtu']; ?></td>
                                            <td><?= $items['preEtu']; ?></td>
                                            <td><?= $items['nomClasse']; ?></td>
                                            <td><?= $items['rqBilanUn']; ?></td>
                                            <td><?= $items['rqBilanDeux']; ?></td>
                                            <td><?= $items['nomSpe']; ?></td>
                                        </tr>
                                        <?php
                                    }

                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4">Aucun étudiant trouvé</td>
                                    </tr>
                                    <?php
                                }
                            }
                        } catch (PDOException $e) {
                            echo "Erreur de connexion : " . $e->getMessage();
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>