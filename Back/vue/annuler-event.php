<?php
    include("../../config.php");
    include '../../controllers/EventC.php';
    include '../includes/send.php';
    $eventC = new EventC();
    $list=$eventC->getEmailsAndNumbers($_GET["id"]);
  
    foreach($list as $l)
    {
        sendSms($l['numero']," We are sorry , event has been removed ! !");
        // sendEmail($l['email'],"We are sorry , event has been removed ! !","Event cancled");
    }
    $eventC->supprimerEvent($_GET["id"]);

    header('Location:list-events.php?status=cancled');
?>