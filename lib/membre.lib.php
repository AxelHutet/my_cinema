<?php
 require('conn.lib.php');

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
