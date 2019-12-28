<?php
 require_once('conn.lib.php');

function getMembreById($id){
    $conn = getConnection();
    $sql = 'SELECT * FROM membre WHERE id_membre='.$id;
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}

function getAllMembre(){
    $conn = getConnection();
    $sql = 'SELECT * FROM membre';
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}


function getMembersByNameFornameAndId($name,$forname,$id){
    $conn = getConnection();
    $sql = 'SELECT m.* FROM membre m, fiche_personne fp where m.id_fiche_perso = fp.id_perso';
    if(!empty($name)){
        $sql .= " AND fp.nom LIKE '%".$name."%' ";
    }
    if(!empty($name)){
        $sql .= " AND fp.prenom LIKE '%".$forname."%' ";
    }
    if(!empty($name)){
        $sql .= " AND m.id_membre=".$id." ";
    }
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}