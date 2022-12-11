<?php
include '../Controller/catC.php';
$catC=new CatC();


if(
  
    isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['descr']) && !empty($_POST['descr'])
   

){
    $cat = new cat($_POST['nom'],$_POST['descr']);
    $catC->ajouterCat($cat);
}
else
{
echo 'Erreur test';
header('Location: dashboard2.php');
}
?>


