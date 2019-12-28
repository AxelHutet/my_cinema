<?php
require_once('conn.lib.php');


function getFilmByTitle($title,$min=-1, $nbr=0){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE titre LIKE "%'.$title.'%"';
    if($min != -1 && $nbr != 0){
        $sql .= " LIMIT ".$min.", ".$nbr;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getFilmByGenre($genre,$min=-1, $nbr=0){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE id_genre='.$genre;
    if($min != -1 && $nbr != 0){
        $sql .= " LIMIT ".$min.", ".$nbr;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getFilmByDistrib($distrib,$min=-1, $nbr=0){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE id_distrib='.$distrib;
    if($min != -1 && $nbr != 0){
        $sql .= " LIMIT ".$min.", ".$nbr;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getAllFilm($min=-1, $nbr=0){
    $conn = getConnection();
    $sql = 'SELECT * FROM film';
    if($min != -1 && $nbr != 0){
        $sql .= " LIMIT ".$min.", ".$nbr;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}

