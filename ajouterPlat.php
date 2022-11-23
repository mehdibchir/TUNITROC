<?php
include '../Controller/platC.php';
$platC=new PlatC();


if(
    isset($_POST['Nomplat']) && !empty($_POST['Nomplat'])
    && isset($_POST['descP']) && !empty($_POST['descP'])
    && isset($_POST['categorie']) && !empty($_POST['categorie'])
    && isset($_POST['img']) && !empty($_POST['img'])

){
    $plat = new plat($_POST['Nomplat'],$_POST['descP'],$_POST['categorie'],$_POST['img']);
    $platC->ajouterPlat($plat);
}
else
{
echo 'Erreur test';
//header('Location: dashboard.php');
}
?>


