<?php
include("../../config.php");
include("../../Controllers/EventC.php");
$eventC = new EventC();
$eventC->unjoin($_GET["idevent"],$_GET["iduser"]);
header('Location:events.php?page=1');

    



?>