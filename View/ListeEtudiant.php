<?php

require_once '../config/appConfig.php';
require_once '../src/model/DAO/EleveDAO.php';
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des étudiants</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Liste des étudiants</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">

                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="soumettre" required value="<?php if(isset($_GET['soumettre'])){echo $_GET['soumettre']; } ?>" class="form-control" placeholder="Soumettre">
                                    <button type="submit" class="btn btn-primary">Soumettre</button>
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
                        $con = mysqli_connect("localhost","root","","projetfsi");

                        if(isset($_GET['soumettre']))
                        {
                            $filtervalues = $_GET['soumettre'];
                            $query = "SELECT Etudiant.nomEtu, Etudiant.preEtu, Classe.nomClasse, bilanun.rqBilanUn, bilandeux.rqBilanDeux, Specialisation.nomSpe FROM Etudiant INNER JOIN Classe ON Etudiant.idClasse = Classe.idClasse INNER JOIN bilanun ON Etudiant.idBilanUn = bilanun.idBilanUn INNER JOIN bilandeux ON Etudiant.idBilanDeux = bilandeux.idBilanDeux INNER JOIN Specialisation ON Etudiant.idSpe = Specialisation.idSpe WHERE CONCAT(Etudiant.nomEtu, Etudiant.preEtu, Etudiant.idClasse, Classe.nomClasse, bilanun.rqBilanUn, bilandeux.rqBilanDeux, Specialisation.nomSpe) LIKE '%$filtervalues%'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $items)
                                {
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
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <td colspan="4">Aucun étudiant trouvé</td>
                                </tr>
                                <?php
                            }
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