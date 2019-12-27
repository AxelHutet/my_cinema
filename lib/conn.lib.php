<?php

define ("LOCATION", "localhost");
define ("DB", "cinema");
define ("PORT", 3306);
define ("USER", "root");
define ("PWD", "");

function getConnection() {

    $mysqli = new mysqli(LOCATION, USER, PWD, DB, PORT);
    if ($mysqli->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        return $mysqli;
    }
}
?>