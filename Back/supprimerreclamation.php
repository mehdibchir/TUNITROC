<?php
	include '../Controllers/ReclamationC.php';
	$reclamationC=new ReclamationC();
	$reclamationC->supprimerreclamation($_POST["id"]);
	header('Location:consulterreclamation.php');
?>