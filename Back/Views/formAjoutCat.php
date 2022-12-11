<?php
	include '../../config.php';
    $sql="SELECT * FROM plat";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
            include'entete.php';
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>
    <body>
        <button><a href="dashboard2.php" class="btn">Retour</a></button>
        <hr>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="details">
                    <div class="recentorders">
                        <div class="cardheader">
                           <center> <h1>Ajouter une catégorie</h1></center>
+                            </div>   

        <form action="ajouterCat.php" method="post">
        <div class="home-section5">
            <table border="5" align="center">
            
                
                    <td>
                        <label for="nom">Nom catégorie:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" minlength="3" maxlength="20" placeholder="nom catégorie"></td>
                </tr>
                <tr>
                    <td>
                        <label for="descr">description:
                        </label>
                    </td>
                    <td><textarea type="text" name="descr" id="descr"minlength="5" placeholder="decription de la categorie"></textarea></td>
                </tr>     
                <tr>
                    <td></td>
                    <td>
                    <form method="post" action="dashboard2.php">
                        <input type="submit" class="btn" value="Envoyer"> 
                        </form>
                    </td>
                    <td>
                        <input type="reset" class="btn" value="Annuler" >
                    </td>
                </tr>
            </table>
            </div>
        </form>
    </body>
</html>