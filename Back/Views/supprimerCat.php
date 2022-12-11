<?php
	include '../Controller/catC.php';
	$catC=new CatC();
	$catC->supprimerCat($_POST["id_cat"]);
	header('Location:dashboard2.php');
?>