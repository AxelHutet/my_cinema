<?php
 require('conn.lib.php');

function getMembreById($id){
    $conn = getConnection();
    $sql = 'SELECT * FROM membre WHERE id='.$id;
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}