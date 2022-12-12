<?php
include 'platC.php';
$id_plat = $_POST["id_plat"];
$platC=new PlatC();
if(
    isset($_POST['Nomplat']) && !empty($_POST['Nomplat'])
    &&isset($_POST['descP']) && !empty($_POST['descP'])
    &&isset($_POST['categorie']) && !empty($_POST['categorie'])
    &&isset($_POST['img']) && !empty($_POST['img'])
    &&isset($_POST['echange']) && !empty($_POST['echange'])
    &&isset($_POST['num']) && !empty($_POST['num'])
){
    $plat = new plat($_POST['Nomplat'],$_POST['descP'],$_POST['categorie'],$_POST['img'],$_POST['echange'],$_POST['num']);
    $platC->echange($plat,$id_plat);
}else{
    echo 'erreur';
    header('Location: project.php');
}

?>