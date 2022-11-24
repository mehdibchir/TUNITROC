<?php
    include '../controller/EventC.php';
    $eventC = new EventC();
    $eventC->supprimerEvent($_GET["id"]);
    
    header('Location:list-events.php?status=deleted');
?>