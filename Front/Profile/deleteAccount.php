<?php
include "../../config.php";
include "../../Controllers/utilisateursController.php";

session_start();

// Suppression de l'utilisateur
$utilisateursController = new utilisateursController();
$utilisateursController->supprimerutilisateurs($_SESSION["id"]);

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');

//redirection
header('Location: ../Home/index.php');


?>
