<?php
 include_once '../Model/cat.php';
 include_once '../Controller/catC.php';
 $catC=new catC();
$liste=$catC->afficherCat();
include 'entete.php';

?>


     
   
<div class="home-content">         
                  <tbody>
               <center>   <h1 class="font-weight-bolder mb-0">Gestion des categories</h1></center>
          
        
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <!-- <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Authors table</h6>
              </div> --> 
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                  <div class="box">
      <table class="mtable">

                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id categorie</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      
                 
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  
                                    <?php
                foreach($liste as $cat) {
             ?>
                                        <tr>
                                           <td> <?php echo $cat['id_cat']; ?></td>
                                      
                                           <td> <?php echo $cat['nom']; ?></td>
                                           <td> <?php echo $cat['descr']; ?></td>
                                          
                                          
                                           <td>
                                            <form method="post" action="formModifierCat.php">
						                     <input type="submit" class="btn modif" name="Modifier" value="Modifier">
						                     <input type="hidden" value=<?PHP echo $cat['id_cat']; ?> name="id_cat">
					                        </form>
                                          </td>

                                           <td> 
                                           <form method="post" action="supprimerCat.php">
						                     <input type="submit" class="btn supp" name="Supprimer" value="Supprimer">
						                     <input type="hidden" value=<?PHP echo $cat['id_cat']; ?> name="id_cat">
					                        </form> 
                                           </td>
                                           </tr>
                                           <?php
                }
                                           ?>
                                    </tbody>
                                    </table>
                                 
                 
                                            </div>
            </div>
          </div>
        </div>
      </div>


                           
                           
                     