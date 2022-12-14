<?php
include '../Controllers/ReclamationC.php';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=liste_des_reclamations.xls");
$reclamationC=new ReclamationC();
    $listeReclamations=$reclamationC->afficherreclamation1();
 ?>
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border='2'>
                                    <thead>

                                    <table border="1" style="position: relative;  top: 50px; width: 100%; height: 100px; ">
                 <tr>
                 <th>Id_Réclamation</th>
                     <th>Type de Réclamation</th>
                     <th >Date</th>
                     <th >Sujet</th>
                     <th >Description</th>
                     <th >Status</th>
             
    

                     <!--<td colspan="2" style="color: white; text-align: center;">Actions</td>-->
                 </tr>
                 <?php
                 foreach($listeReclamations as $reclamation){
                     ?>
                     <tr>
                <td ><?php echo $reclamation['id_reclamation']; ?></td>
				<td ><?php echo $reclamation['type']; ?></td>
				<td ><?php echo $reclamation['date_reclamation']; ?></td>
                <td ><?php echo $reclamation['sujet']; ?></td>
				<td ><?php echo $reclamation['description']; ?></td>
                <td ><?php echo $reclamation['status'];?></td>

      <?php
              }
      ?>
</table>