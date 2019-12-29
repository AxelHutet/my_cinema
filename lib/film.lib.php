<?php
require_once('conn.lib.php');

function getFilmByDistribGenreAndTitle($title, $distrib, $genre, $pagination, $min = 0){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE 1=1 ';
    if(strlen($title) > 0){
        $sql .= " AND titre LIKE '%".$title."%'";
    }
    if(strlen($distrib) > 0){
        $sql .= " AND id_distrib=".$distrib;
    }
    if(strlen($genre) > 0){
        $sql .= " AND id_genre=".$genre;
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

function getCountFilmByDistribGenreAndTitle($title, $distrib, $genre){
    $conn = getConnection();
    $sql = 'SELECT COUNT(*) FROM film WHERE 1=1 ';
    if(strlen($title) > 0){
        $sql .= " AND titre LIKE '%".$title."%'";
    }
    if(strlen($distrib) > 0){
        $sql .= " AND id_distrib=".$distrib;
    }
    if(strlen($genre) > 0){
        $sql .= " AND id_genre=".$genre;
    }

    if($result = $conn->query($sql)){
        return $result->fetch_row();
    }else{
        return "";
    }
}