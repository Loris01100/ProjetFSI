<?php

// Définition des chemins:
define('BASE_DIR', dirname(dirname(__FILE__)));  // Le dossier de l'application
define('SRC_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR); // Pour vos classes

// Définition du path d'inclusion
set_include_path(get_include_path() . PATH_SEPARATOR . SRC_DIR);

// Autoload avec prise en compte des espaces de nom et compatibilité Linux (problème des séparateurs d'espace de nom...)
spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = SRC_DIR . $className . '.php';

    if (file_exists($file)) {
        require_once($file);
    } else {
        echo "Erreur : Classe non trouvée à l'emplacement: $file";
    }
});

// Fonction dump_var
function dump_var($var, $dump = true, $msg = null)
{
    if ($dump) {
        if ($msg) {
            echo "<p><strong>$msg</strong></p>";
        }
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
