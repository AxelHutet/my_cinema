<?php
 require_once('conn.lib.php');

 function getMembersByNameFornameAndId($name,$forname,$id, $pagination, $min = 0){
    $conn = getConnection();
    $sql = 'SELECT m.* FROM membre m, fiche_personne fp WHERE m.id_fiche_perso = fp.id_perso';
    if(strlen($name) > 0){
        $sql .= " AND fp.nom LIKE '%".$name."%' ";
    }
    if(strlen($forname)>0){
        $sql .= " AND fp.prenom LIKE '%".$forname."%' ";
    }
    if(strlen($id)>0){
        $sql .= " AND m.id_membre=".$id." ";
    }
     if($pagination == 0){
         $sql .= " LIMIT ".$min;
     }
     if($pagination != 0){
         $sql .= " LIMIT ".$min." OFFSET ".$pagination;
     }
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}

function getCountMembersByNameFornameAndId($name,$forname,$id){
    $conn = getConnection();
    $sql = 'SELECT COUNT(*) FROM membre m, fiche_personne fp WHERE m.id_fiche_perso = fp.id_perso ';
    if(strlen($name) > 0){
        $sql .= " AND fp.nom LIKE '%".$name."%'";
    }
    if(strlen($forname) > 0){
        $sql .= " AND fp.prenom LIKE '%".$forname."%'";
    }
    if(strlen($id) > 0){
        $sql .= " AND m.id_membre=".$id;
    }

    if($result = $conn->query($sql)){
        return $result->fetch_row();
    }else{
        return "";
    }
}