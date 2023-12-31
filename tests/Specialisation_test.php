<?php

require "../config/globalConfig.php";
require "../config/appConfig.php";

use BO\Specialisation;
use DAO\SpecialisationDAO;

$specialisation = new Specialisation(1, "SNIR");

$specialisationDao = new SpecialisationDAO($pdo);

$allSpe = $specialisationDao->getAll();
echo "Specialisation " . count($allSpe) . " Specialisation.\n";

$speId = $specialisationDao->addSpecialisation($specialisation);
echo "Specialisation: $speId\n";