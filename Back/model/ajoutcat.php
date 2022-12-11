<?php
include 'connexion.php';
var_dump($_POST);


      echo"mmmmm";
      $sql = "INSERT INTO categorie(categorie)        
        VALUES(?)";
      
       $req = $connexion->prepare($sql);
       $req->execute([
        $_POST['categorie']
        
      ]);

    if($req->rowCount()!=0) {
      echo"categorie ajoutée avec succés";
    }else{
        echo"une erreur s'est produite lors de l'ajout de la categorie";
    }
