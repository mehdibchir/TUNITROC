<?php
	include '../Controller/platC.php';
	$platC=new PlatC();
	$platC->supprimerPlat($_POST["id_plat"]);
	header('Location:dashboard.php');
?>