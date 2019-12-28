<?php
require_once('conn.lib.php');

function getGenreById($genre){
    $conn = getConnection();
    $sql = 'SELECT * FROM genre WHERE id_genre ='.$genre;
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        return "";
    }
}
function getAllGenre(){
    $conn = getConnection();
    $sql = 'SELECT * FROM genre';
    if($result = $conn->query($sql)){
        return $result->fetch_all(MYSQLI_ASSOC);
    }else{
        return "";
    }
}