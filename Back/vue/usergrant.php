<?php
    include("../../config.php");
    include("../../Controllers/utilisateursController.php");
    $utilisateursController = new utilisateursController();
    $utilisateursController->modifierRole($_GET['id'],'admin');
    header('Location: utilisateurs.php');
?>