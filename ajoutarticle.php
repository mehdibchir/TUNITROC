<?php
include 'connexion.php';

var_dump($_POST);


if(
  !empty($_POST['nom_article'])
  && !empty($_POST['courseName'])
  && !empty($_POST['quantite'])
  && !empty($_POST['id_propriétaire'])
  && !empty($_POST['date_de_publication'])
  && !empty($_POST['disponibilite'])
  && !empty($_POST['img'])
){
      echo"mmmmm";
      $sql = "INSERT INTO article(nom_article,categorie,quantite,id_propriétaire,date_de_publication,disponibilite,img)        
        VALUES( ?, ?, ?, ?, ? , ?, ?)";
      
       $req = $connexion->prepare($sql);
       $req->execute(array(
        $_POST['nom_article'],
        $_POST['courseName'],
        $_POST['quantite'],
        $_POST['id_propriétaire'],
        $_POST['date_de_publication'],
        $_POST['disponibilite'],
        $_POST['img']
       ));

    if($req->rowCount()!=0) {
      $_SESSION['message']['text']="article ajouté avec succés";
      $_SESSION['message']['type']="success";
      
    }else{
      $_SESSION['message']['text']="une erreur s'est produite lors de l'ajout de l'article";

      $_SESSION['message']['type']="  danger";

       
    }}else {
      $_SESSION['message']['text']="une information obligatoire non rensignée";
      $_SESSION['message']['type']="  danger";
    
    }
header('location:../vue/article.php');