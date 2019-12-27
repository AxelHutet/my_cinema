<?php
require('conn.lib.php');

function getHistorical($client){
    $conn = getConnection();
    $idPerso = 'SELECT id_perso FROM fiche_personne WHERE nom LIKE "%'.$client.'%"';
    $idMembre = 'SELECT id_membre FROM membre WHERE id_fiche_perso='.$idPerso;
    $idFilm = 'SELECT id_film FROM historique_membre WHERE id_membre='.$idMembre;
    $sql = 'SELECT * FROM film WHERE id_film='.$idFilm;
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}