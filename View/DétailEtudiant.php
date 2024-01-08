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

            echo "<h1>Détails de l'étudiant $etuId</h1>";
            echo "<p>Nom : {$detail->getNomEleve()}</p>";
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

    echo "ID de l'étudiant non spécifié";
}
?>
