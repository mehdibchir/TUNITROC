<?php 
include 'conn.php';
    $query ="SELECT categorie FROM categorie";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>