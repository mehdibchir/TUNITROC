<?php
include '../Controller/catC.php';
$catC=new CatC();
include'entete.php';
?>

<html lang="en">
<head>
    
   
    <title>User Display</title>
</head>
    <body>
       
        
        
    <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="details">
                    <div class="recentorders">
                        <div class="cardheader">
                          <center>  <h1>Modifier une catégorie</h1></center>
                            </div>   
           
    <div class="home-section">
                  
            

        
        <form action="modifierCat.php" method="POST">
        <?php
			if (isset($_POST['id_cat'])){
				$cat =$catC->recupererCat($_POST['id_cat']);
				
		?>
            <table border="1" align="center">
                
                <tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="nom" value="<?php echo $cat['nom']; ?>" id="nom">
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label for="descr">description:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="descr" value="<?php echo $cat['descr']; ?>" id="descr">
                    </td>
                </tr>  
                          
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" class="btn" value="Annuler" >
                    </td>
                </tr>
            </table>
            <?php
		}
		?>
        </form>
</div>
    </body>
</html>