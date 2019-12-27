<?php
require('conn.lib.php');

function getMembreByName($name){
    $conn = getConnection();
    $sql = 'SELECT * FROM fiche_personne WHERE name LIKE'.$name;
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getAllPersonne(){
    $conn = getConnection();
    $sql = 'SELECT * FROM fiche_personne';
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}