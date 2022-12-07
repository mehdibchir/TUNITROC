<?php
include "../../config.php";
include "../../Controllers/utilisateursController.php";
include "../../Models/utilisateurs.php";


$utilisateursController = new utilisateursController();

if (isset($_POST['id']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['telephone']) and isset($_POST['sexe']))
{
    session_start();
    if(!password_verify($_POST['password'], $_SESSION['password'])){
        header('Location: index.php?erreur=1');
    }else{
        
        $utilisateurs=new utilisateurs($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_SESSION['password'],$_POST['telephone'],$_POST['sexe'],"user",$_SESSION['image']);
        $utilisateursController=new utilisateursController();

        //modifier dans la base de données
        $utilisateursController->modifierutilisateurs($utilisateurs,$_POST['id']);

        //modifier dans la session actuelle
        $_SESSION["email"] = $utilisateurs->getemail();
        $_SESSION["nom"] = $utilisateurs->getnom();
        $_SESSION["prenom"] = $utilisateurs->getprenom();
        $_SESSION["telephone"] = $utilisateurs->gettelephone();
        $_SESSION["sexe"] = $utilisateurs->getsexe();
        

        header('Location: ../Home/index.php');        
    }

}else{
    echo 'verifier les champs';
}

?>