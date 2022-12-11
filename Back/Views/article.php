<?php
include_once '../Model/plat.php';
include_once '../Controller/platC.php';

$platC = new platC();
$liste = $platC->afficherPlat();
//$liste=$platC->afficherPlaat();

include 'entete.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="fichier.js"></script>







  <table class="mtable">
      <Tr>
        <div class="home-content">
          <div class="box">
            <center>
              <h1 class=".home-section nav .search-box" centred>Gestion article</h1>
            </center>
            <th>
              <center> <a href="formAjoutPlat.php" class="button">Ajouter un article</a>
              </center></th>
           
            <th>
              <center><a href="dash.php" class="button">Trie ID</a>
              </center></th>
           
            <th>
              <center><a href="dashprix.php" class="button">Trie par categorie </a> </center> </th>
           
            <th>
              <center><button onclick="generatePDF()">Download</button></center>
            </th>



          </div>
        </div>
        </tr>
        </div>
  </table>
  <?php
$platParPage =10;
$sql = "SELECT id_plat FROM plat";
$db = config::getConnexion();
try {
    $query = $db->prepare($sql);
    $query->execute();

    $plat = $query->rowCount();;
    
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
$pagesTotales=ceil($plat/$platParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
  $_GET['page']=intval($_GET['page']);
  $pageCourante=$_GET['page'];
  }else{
      $pageCourante=1;
  }
  $depart=($pageCourante-1)*$platParPage;




?>
  <div id="invoice">
  <table class="mtable">

    <tr>
     <center> <th class="th,td">Id</th></center>
      <th class="th,td">Nom</th>
     <center> <th class="th,td">Description</th></center>
      <th class="th,td">catégorie</th>
      <th class="th,td">Image</th>
      <th class="th,td">modifier</th>
      <th class="th,td">supprimer</th>
    </tr>





    <?php
                  $db = config::getConnexion();
       $liste=$db->query('SELECT * FROM plat ORDER BY id_plat DESC LIMIT '.$depart.','.$platParPage);
  
foreach ($liste as $plat) {
?>

    <tr>
      <td>
        <?php echo $plat['id_plat']; ?>
      </td>
      <td>
        <?php echo $plat['Nomplat']; ?>
      </td>
      <td>
        <?php echo $plat['descP']; ?>
      </td>
      <td>
        <?php echo $plat['categorie']; ?>
      </td>
      <td> <img src="../img/<?php echo $plat['img']; ?>" height="200" width="200"></td>
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
      <?php 
        for($i=1;$i<=$pagesTotales;$i++){
            if($i == $pageCourante){
               
            echo $i.' ';
             
            }else{
            echo '<a href="dashboard.php?page='.$i.'" class="pagee">'.$i.'</a> ';
        }
    }

?>




</div>
    <form method="post" action="dashboard2.php">
      <input type="submit" class="button" name="Catégorie" value="tableau des categories">
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    </div>




    <script src="assets/js/script.js"></script>
    </body>

</html>