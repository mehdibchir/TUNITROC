<?php
include '../Controller/platC.php';
$id_plat = $_POST["id_plat"];
$platC=new PlatC();
if(
    isset($_POST['Nomplat']) && !empty($_POST['Nomplat'])
    &&isset($_POST['descP']) && !empty($_POST['descP'])
    &&isset($_POST['categorie']) && !empty($_POST['categorie'])
    &&isset($_POST['img']) && !empty($_POST['img'])
){
    $plat = new plat($_POST['Nomplat'],$_POST['descP'],$_POST['categorie'],$_POST['img']);
    $platC->modifierPlat($plat,$id_plat);
}else{
    echo 'erreur';
    header('Location: dashboard.php');
}

?>