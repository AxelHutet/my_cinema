<?php
require_once('conn.lib.php');

function getHistoricalByMembre($client){
    $conn = getConnection();
    $sql = "SELECT hm.* from historique_membre hm WHERE hm.id_membre = ".$client. " ORDER BY DATE DESC";
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}
function addFilmHistorical($id_membre, $id_film, $date){
    $conn = getConnection();
    $sql = "INSERT INTO historique_membre(id_membre, id_film, date) VALUES(".$id_membre.",".$id_film.",'".$date."')";
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function addAvis($avis, $id_membre, $id_film, $date){
    $conn = getConnection();
    $sql = "INSERT INTO historique_membre (avis) VALUES('".$avis."')";
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
