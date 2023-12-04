<?php

require "../config/globalConfig.php";
require "../config/appConfig.php";

use BO\Utilisateur;
use DAO\UtilisateurDAO;

$user = new Utilisateur(2, "GOUDET", "123bonjour");
$userDAO = new UtilisateurDAO($pdo);
var_dump($userDAO->getAll());
var_dump($user);
echo "< br />";
if($userDAO->create($user))
{
    echo "<br />Ajout de l'utilisateur avec succès en base<br />";

} else
{
    echo "Erreur dans l'ajout";
}


