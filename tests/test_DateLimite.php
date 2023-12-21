<?php
require_once '../config/appConfig.php';
require_once '../config/globalConfig.php';

use BO\DateLimiteBilanUn;
use DAO\DateLimiteBilanUnDAO;

// Créer une instance du DAO
$dateLimiteBilanUnDAO = new DAO\DateLimiteBilanUnDAO($pdo);

// ID de la date limite à récupérer (à remplacer par l'ID réel)
$idDateLimite = 1;

// Appeler la méthode getDateLimiteById
$dateLimite = $dateLimiteBilanUnDAO->getDateLimiteById($idDateLimite);

// Afficher les résultats
if ($dateLimite) {
    echo "Date Limite ID: " . $dateLimite->getIdDateLimite() . "<br>";
    echo "Date Limite: " . $dateLimite->getDateLimite()->format('Y-m-d H:i:s') . "<br>";
} else {
    echo "Date Limite non trouvée pour l'ID $idDateLimite";
}
