<?php
 require('conn.lib.php');

function getMembreById($id){
    $conn = getConnection();
    $sql = 'SELECT * FROM membre WHERE id=:id';
    $stmt = mysqli_prepare($conn, $sql)
}