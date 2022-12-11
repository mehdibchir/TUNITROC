<?php
include("../../config.php");
include("../../Controllers/EventC.php");
$eventC = new EventC();
$eventC->join($_GET["idevent"],$_GET["iduser"]);
header('Location:events.php?page=1');

    



?>