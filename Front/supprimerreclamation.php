<?php
	include '../Controllers/ReclamationC.php';
	$reclamationC=new ReclamationC();
	$reclamationC->supprimerreclamation($_GET["id"]);
	header('Location:consulterreclamation.php');
?>