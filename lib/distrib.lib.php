<?php
require_once('conn.lib.php');

function getDistribById($distrib){
    $conn = getConnection();
    $sql = 'SELECT * FROM distrib WHERE id_distrib='.$distrib;
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getAllDistrib(){
    $conn = getConnection();
    $sql = 'SELECT * FROM distrib';
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}