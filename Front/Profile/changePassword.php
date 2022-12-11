<?php  
	include "../../config.php";
	include "../../Controllers/utilisateursController.php";

    session_start();
    $currentPassword = $_SESSION['password'];
    $oldPassword = $_POST['oldPassword'];

    if(password_verify($oldPassword,$currentPassword)){
        $hashed = password_hash($_POST['newPassword'],PASSWORD_DEFAULT);

        //modifier le mot de passe dans la base de donnée
        $utilisateursController=new utilisateursController();
        $utilisateursController->modifierPassword($hashed,$_SESSION['id']);

        //modifier le mot de passe dans la session actuelle
        $_SESSION["password"] = $hashed;

        //redirection
        header('Location: ../Home/index.php');               


    }else{
        //mot de passe incorrect
        header('Location: Password.php?erreur=1');     
    }
    


    


    
    

    







?>