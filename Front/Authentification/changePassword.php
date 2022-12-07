<?php
	include "../../config.php";
	include "../../Models/utilisateurs.php";
	include "../../Controllers/utilisateursController.php";

    if (isset($_POST['phone']) && isset($_POST['password'])) {
        	$utilisateursController=new utilisateursController();

            $hashed = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $utilisateursController->changePassword($_POST['phone'],$hashed);

            echo json_encode(['code'=>200, 'message'=>"Nouveau mot de passe enregistré"]);

            
            
    }


?>