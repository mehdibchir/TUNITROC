<?php

$nom_serveur="localhost";
$nom_base_de_donnee = "tunitroc_db";
$utilisateur = "root";
$password="";
try {
    $connexion = new PDO(
        "mysql:host=$nom_serveur;dbname=$nom_base_de_donnee",$utilisateur,$password);
      $connexion->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      return $connexion;
        
        
        
}
catch(Exception $e) { //ERROR 
    die( "connection failed: ". $e->getMessage());

}


// ----------------------------------------------------------------------
?>

