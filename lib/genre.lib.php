<?php
require('conn.lib.php');

function getFilmByGenre($genre){
    $conn = getConnection();
    $sql = 'SELECT * FROM film WHERE titre LIKE'.$genre;
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