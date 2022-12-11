<?php
include '../Controller/platC.php';
$platC=new PlatC();

$sql="SELECT * FROM categorie";
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
TUNITROC  </title>
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
        <button><a href="dashboard.php" class="btn">Retour</a></button>
        <hr>
        
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="details">
                    <div class="recentorders">
                        <div class="cardheader">
                          <center>  <h1>Modifier un article</h1></center>
                            </div>   


        
        <form action="modifierPlat.php" method="POST">
        <?php
			if (isset($_POST['id_plat'])){
				$plat =$platC->recupererPlat($_POST['id_plat']);
				
		?>
          <center>  <table border="5" align="center"></center>
            <div class="home-section6">
                <tr>
                    <td>
                        <label for="Nomplat">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="Nomplat" id="Nomplat" value="<?php echo $plat['Nomplat']; ?>" minlength="3" maxlength="20" required></td>
                    <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">
                </tr>
               
                <tr>
                    <td>
                        <label for="descP">Description:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="descP" value="<?php echo $plat['descP']; ?>" id="descP" minlength="5" required>
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label for="categorie">Les categories:
                        </label>
                    </td>
                    <td>
                        <select name="categorie" id="categorie">
                        <?php
                         foreach($liste as $categorie) {
                        ?>
                                <option value="<?php echo $categorie['nom'] ?>"><?php echo $categorie['nom'] ?></option>
                                     <?php }  ?>
                    </select>;  
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label for="img">Image:
                        </label>
                    </td>
                    <td>
                        <input type="file" name="img" value="<?php echo $plat['img']; ?>" id="img">
                    </td>
                </tr>            
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn" value="Modifier"> 
                    </td>
                    <td>
                    <button><a href="dashboard.php" class="btn">Annuler</a></button>
                    </td>
                </tr>
                </div>
            </table>
            <?php
		}
		?>
        </form>

    </body>
</html>