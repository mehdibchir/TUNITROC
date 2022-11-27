<?php
    include("../../config.php");
    include("../../Controllers/utilisateursController.php");
    $utilisateursController = new utilisateursController();
    $utilisateursController->modifierRole($_GET['id'],'user');
    header('Location: utilisateurs.php');
?>