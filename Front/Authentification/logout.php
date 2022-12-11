<?php 
session_start();
include "../../config.php";
$db = config::getConnexion();
$req = $db->prepare('UPDATE utilisateurs SET connected=:connected WHERE id=:id');
$req->execute(array('connected' => 0,'id'=> $_SESSION['id']));
$res = $req->fetch();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');
header('Location: index.php');
?>