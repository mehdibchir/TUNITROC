<?php
 include_once '../Model/plat.php';
 include_once '../Controller/platC.php';
 $platC=new platC();
$liste=$platC->afficherPlat();
//$liste=$platC->afficherPlaat();

include 'entete.php';
?>

<!DOCTYPE html>
<html lang="en">



    
   
         
         
<table class="mtable">
<div class="box">
       <Tr >
        <div class="home-content">
        <div class="box">
       <center> <h1 class=".home-section nav .search-box" centred>Gestion article</h1></center>
        <th> <center> <a href="formAjoutPlat.php" class="button">Ajouter un article</a></th></center>
          <th><center><a href="dash.php" class="button"  >Trie ID</a></th></center>
         <th> <center><a href="dashprix.php" class="button">Trie par categorie </a></th></center>
            </div>
            </div>
</table>
            
           
      <table class="mtable">
                  
                    <tr>
                      <th class="th,td">Id</th>
                      <th class="th,td">Nom</th>
                      <th class="th,td">Description</th>
                      <th class="th,td">catégorie</th>
                      <th class="th,td">Image</th>
                      <th class="th,td">modifier</th>
                      <th class="th,td">supprimer</th>
                    </tr>
                  
                  

               

                  
<?php
                foreach($liste as $plat) {
             ?>
             
                                        <tr>
                                           <td> <?php echo $plat['id_plat']; ?></td>
                                           <td> <?php echo $plat['Nomplat']; ?></td>
                                           <td> <?php echo $plat['descP']; ?></td>
                                           <td> <?php echo $plat['categorie']; ?></td>
                                           <td>    <img src="../img/<?php echo $plat['img']; ?>" height="200" width="200"></td> 
                                           <td>                      
                                            <form method="post" action="formModifierPlat.php">
						                     <input type="submit" class="btn modif" name="Modifier" value="Modifier">
						                     <input type="hidden" value=<?PHP echo $plat['id_plat']; ?> name="id_plat">
					                        </form>
                                          </td>

                                           <td> 
                                           <form method="post" action="supprimerPlat.php">
						                     <input type="submit" class="btn supp" name="Supprimer" value="Supprimer">
						                     <input type="hidden" value=<?PHP echo $plat['id_plat']; ?> name="id_plat">
					                        </form> 
                                           </td>
                                           </tr>
                                          
                                          </div>
                                           <?php
                }
                                           ?>
                

              
                  
               
                <form method="post" action="dashboard2.php">
						                   <input type="submit" class="button" name="Catégorie" value="tableau des categories">
					                        </form>
              </div>
            </div>
          </div>
        </div>
      </div>

 
                           
                           
          
                          
                                    
</body>

</html>

