<?php
 include_once '../Model/plat.php';
 include_once '../Controller/platC.php';
 $platC=new platC();
$liste=$platC->afficherPlaaat();
include 'entete.php';
?>

<!DOCTYPE html>
<html lang="en">


<head>
  
<div class="home-content">
  <div class="overview-boxes">
 
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  
<?php
                foreach($liste as $plat) {
             ?>
                                        <tr>
                                           <td> <?php echo $plat['id_plat']; ?></td>
                                           <td> <?php echo $plat['Nomplat']; ?></td>
                                           <td> <?php echo $plat['descP']; ?></td>
                                           <td> <?php echo $plat['categorie']; ?></td>
                                           <td>    <img src="../img/<?php echo $plat['img']; ?>" height="250" width="250"></td> 
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
                                           <?php
                }
                                           ?>
                

              
                  </tbody>
                </table>
                <form method="post" action="dashboard.php">
						                     <input type="submit" class="button" name="retour" value="retour">
					                        </form>
              </div>
            </div>
          </div>
        </div>
      </div>

 
    </div>                       
                           
               
</body>

</html>

