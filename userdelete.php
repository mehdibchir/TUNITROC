<?php
include "../../config.php";
include "../../Controllers/utilisateursController.php";

// Suppression de l'utilisateur
$utilisateursController = new utilisateursController();
$utilisateursController->supprimerutilisateurs($_GET["id"]);


//redirection
header('Location: utilisateurs.php');


?>
