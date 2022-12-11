<?php
    include '../../config.php';
    include '../../controllers/EventC.php';
    include '../includes/send.php';
    $eventC = new EventC();
   
    $eventC->supprimerEvent($_GET["id"]);

    header('Location:list-events.php?status=deleted');
?>