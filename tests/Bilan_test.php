<?php
require "../config/globalConfig.php";
use BO\Bilan;

$bilan = new Bilan(1, "Mamoune", "123bonjour");
var_dump($bilan);