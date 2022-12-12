<?php
	include '../config.php';
  var_dump($_POST);


      echo"mmmmm";
      $sql = "INSERT INTO article(nom_article,categorie,quantite,id_propriétaire,date_de_publication,disponibilite)        
        VALUES( ?, ?, ?, ?, ? ,?)";
      
       $req = $connexion1->prepare($sql);
       $req->execute([
        $_POST['nom_article'],
        $_POST['categorie'],
        $_POST['quantite'],
        $_POST['id_propriétaire'],
        $_POST['date_de_publication'],
        $_POST['disponibilite']]);

    if($req->rowCount()!=0) {
      echo"article ajouté avec succés";
    }else{
        echo"une erreur s'est produite lors de l'ajout de l'article";
    }

     
