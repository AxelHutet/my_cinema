<?php
require('conn.lib.php');

function getHistoricalByMembre($client){
    $conn = getConnection();
    $sql = "SELECT f.* from film f, historique_membre hm, membre m, fiche_personne fp WHERE fp.id_perso = m.id_fiche_perso AND m.id_membre = hm.id_membre AND hm.id_film = f.id_film AND fp.nom LIKE '%".$client."%'";
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function addFilmHistorical($id_membre, $id_film, $date){
    $conn = getConnection();
    $sql = "INSERT INTO historique_membre(id_membre, id_film, date) VALUES(".$id_membre.",".$id_film.",".$date.")";
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function addAvis($avis, $id_membre, $id_film, $date){
    $conn = getConnection();
    $sql = "ALTER TABLE historique_membre ADD avis VARCHAR(300)";
    $sql .= "INSERT INTO historique_membre (avis) VALUES(".$avis.")";
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}