<?php
require('conn.lib.php');


function getFilmByTitle($title){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE titre LIKE "%'.$title.'%"';
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getFilmByGenre($genre){
    $conn = getConnection();
    $idGenre = 'SELECT id_genre FROM genre WHERE nom='.$genre;
    $sql = 'SELECT * FROM film WHERE id_genre='.$idGenre;
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getFilmByDistrib($distrib){
    $conn = getConnection();
    $idDistrib = 'SELECT id_distrib FROM distrib WHERE nom='.$distrib;
    $sql = 'SELECT * FROM film WHERE id_distrib='.$idDistrib;
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getAllFilm(){
    $conn = getConnection();
    $sql = 'SELECT * FROM film';
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}