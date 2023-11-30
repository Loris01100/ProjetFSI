<?php

function connexionBdd(array $infoBdd): ?\PDO{

    $myport = ($infoBdd['port']);
    $mycharset =($infoBdd['charset']);
    $hostname =($infoBdd['host']);
    $mydbname = ($infoBdd['dbname']);
    $myusername =($infoBdd['user']);
    $mypassword =($infoBdd['pass']);

    $dsn ="mysql:dbname=$mydbname;host=$hostname;port=$myport;charset=$mycharset";

    $db = new \PDO($dsn, $myusername, $mypassword);

    return $db;
};
