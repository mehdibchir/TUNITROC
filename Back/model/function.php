<?php
include 'connexion.php';
function  getArticle()
{
    $sql="SELECT * FROM article";
    $req=$GLOBALS['connexion']->prepare($sql);//preparer la requette
$req->execute();
return $req->fetchAll();

}