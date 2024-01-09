<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'étudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #333;
        }

        p {
            margin: 5px 0;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    require_once '../config/appConfig.php';
    require_once '../config/globalConfig.php';
    use DAO\EleveDAO;

    if (isset($_GET['id'])) {
        $etuId = $_GET['id'];

        try {

            $dsn = "{$infoBdd['type']}:host={$infoBdd['host']};dbname={$infoBdd['dbname']};charset={$infoBdd['charset']}";
            $pdo = new PDO($dsn, $infoBdd['user'], $infoBdd['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $eleveDAO = new EleveDAO($pdo);

            $detail = $eleveDAO->read($etuId);

            if ($detail) {
                echo "<h1>Détails de {$detail->getNomEleve()}</h1>";
                echo "<p>Prénom : {$detail->getPrenomEleve()}</p>";
                echo "<p>Téléphone : {$detail->getTelEleve()}</p>";
                echo "<p>Email : {$detail->getMailEleve()}</p>";
                echo "<p>Entreprise : {$detail->getEntrepriseEleve()}</p>";
            } else {
                echo "<p>Aucun étudiant trouvé avec l'ID $etuId.</p>";
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    } else {
        echo "<p>ID de l'étudiant non spécifié</p>";
    }
    ?>
</div>

</body>
</html>
