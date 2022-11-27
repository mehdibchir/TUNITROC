<?php
$nom_serveur="localhost";
$nom_base_de_donnee = "gestion-de-produit";
$utilisateur = "root";
$password="";
try {
    $connexion1 = new PDO(
        "mysql:host=$nom_serveur;dbname=$nom_base_de_donnee",$utilisateur,$password);
      $connexion1->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connexion1;
        
        echo "connected successfully ";
}
catch(Exception $e) { //ERROR 
    die( "connection failed: ". $e->getMessage());

}
?>

