<?php  
	include "../../config.php";
	include "../../Controllers/utilisateursController.php";


	$target_dir = "../uploads/utilisateurs/";
	$pattern=rand(100000,1000000);
	$target_file = $target_dir.$pattern."_".basename($_FILES["imageUser"]["name"]);

    

    //placer l'image dans le dossier uploads/utilisateurs
    move_uploaded_file($_FILES["imageUser"]["tmp_name"], $target_file);

    //modifier l'image dans la base de donnée
    $utilisateursController=new utilisateursController();
    session_start();
    $utilisateursController->modifierImage($pattern."_".$_FILES["imageUser"]["name"],$_SESSION['id']);

    //modifier l'image dans la session actuelle
    $_SESSION["image"] = $pattern."_".$_FILES["imageUser"]["name"];

    //redirection
    header('Location: ../Home/index.php');       



?>