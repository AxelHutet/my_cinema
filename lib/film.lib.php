<?php
require_once('conn.lib.php');


function getFilmByTitle($title,$min=0, $pagination){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE titre LIKE "%'.$title.'%"';
    if($pagination != 0){
        $sql .= " LIMIT ".$min.", ".$pagination;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getFilmByGenre($genre,$min=0, $nbr=0){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE id_genre='.$genre;
    if($nbr != 0){
        $sql .= " LIMIT ".$min.", ".$nbr;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getFilmByDistrib($distrib,$min=0, $nbr=0){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE id_distrib='.$distrib;
    if($nbr != 0){
        $sql .= " LIMIT ".$min.", ".$nbr;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}

function getFilmByDistribGenreAndTitle($title, $distrib, $genre, $pagination, $min = 0){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE 1=1 ';
    if(strlen($title) > 0){
        $sql .= "AND titre LIKE '%".$title."%'";
    }
    if(strlen($distrib) > 0){
        $sql .= "AND id_distrib=".$distrib;
    }
    if(strlen($genre) > 0){
        $sql .= "AND id_genre=".$genre;
    }
    if($pagination == 0){
        $sql .= " LIMIT ".$min.", 10";
    }
    if($pagination != 0){
        $sql .= " LIMIT ".$min.", ".$pagination;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}
function getAllFilm($min=0, $nbr=15){
    $conn = getConnection();
    $sql = 'SELECT * FROM film';
    if($nbr != 0){
        $sql .= " LIMIT ".$min.", ".$nbr;
    }
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}

