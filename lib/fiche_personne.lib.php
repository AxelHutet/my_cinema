<?php
require_once('conn.lib.php');

function getFichePersonneById($id){
    $conn = getConnection();
    $sql = 'SELECT * FROM fiche_personne WHERE id_perso='.$id;
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}

function getFichePersoByName($name){
    $conn = getConnection();
    $sql = 'SELECT * FROM fiche_personne WHERE nom LIKE "%'.$name.'%"';
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getFichePersoByFirstName($firstname){
    $conn = getConnection();
    $sql = 'SELECT * FROM fiche_personne WHERE prenom LIKE %"'.$firstname.'%"';
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

function getFichePersonneByMemberId($id_membre){
    $conn = getConnection();
    $sql = 'SELECT fp.* FROM fiche_personne fp, membre m where m.id_fiche_perso=fp.id_perso and m.id_membre='.$id_membre;
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}