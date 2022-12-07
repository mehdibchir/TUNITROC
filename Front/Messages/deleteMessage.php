<?php
include "../../config.php";
include "../../Models/message.php";
include "../../Controllers/messageController.php";
	

// Suppression du message
$messageController = new messageController();
$messageController->supprimermessage($_GET["idMessage"]);


//redirection
header('Location: friend.php?id='.$_GET["idFriend"]);


?>
