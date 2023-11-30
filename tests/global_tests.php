<?php

require "../config/globalConfig.php";

use BO\Utilisateur;

$user = new Utilisateur(1, "Mamoune", "123bonjour");
var_dump($user);