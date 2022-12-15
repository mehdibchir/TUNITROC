<?php
session_start();

	include '../Controllers/ReclamationC.php';
    //include '../config.php';
	$reclamationC=new ReclamationC();
   
  
    if(isset($_GET['recherche']))
    { 
        $listeReclamations=$reclamationC->rechercherreclamation($_GET['recherche']);
    }
  
    else{
        $listeReclamations=$reclamationC->afficherreclamation1(); 
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>9achech</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    <body>
  
 
        <header class="header-area header-sticky">
           
            <div class="main-banner" id="top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="left-content">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4 style="color: black; font-size: 15px; text-align: center; position: relative; left: 500px;">Systeme de Gestion des Reclamations des clients</h4>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                </div>
                </div>
                <div style="background-color: rgb(44, 44, 44); height: 500px;">
                    <!--<h4 style="color: white;">La Liste Des Rèclamations </h3>-->
                    <div id="google_translate_element"></div>
         <script type="text/javascript">
             function googleTranslateElementInit() {
                 new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
             }
         </script>

         <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <form action="" method="GET">
                        <table style=" position:relative;top:70px;">
                            <tr>
                        <td><input type="research" placeholder="Rechercher" name="recherche" ></td>
                        <td><input Type="submit" value="Rechercher"></td>
                      </table>
                    </form>
                   
                    <div class="text-center">
        	
        	
        </div>
                <table border="1" style="position: relative;  top: 50px; width: 100%; height: 100px; ">
                 <tr>
                 <th style="color: gold;">Id_Réclamation</th>
                     <th style="color: gold;">Type de Réclamation</th>
                     <th style="color: gold;">Date</th>
                     <th style="color:gold;">Sujet</th>
                     <th style="color: gold;">Description</th>
                

                     <th colspan="2" style="color:gold;">Actions</th>

                     <!--<td colspan="2" style="color: white; text-align: center;">Actions</td>-->
                 </tr>
                 <?php
                 foreach($listeReclamations as $reclamation){
                     ?>
                     <tr>
                <td style="color:white;"><?php echo $reclamation['id_reclamation']; ?></td>
				<td style="color:white;"><?php echo $reclamation['type']; ?></td>
				<td style="color:white;"><?php echo $reclamation['date_reclamation']; ?></td>
                <td style="color:white;"><?php echo $reclamation['sujet']; ?></td>
				<td style="color:white;"><?php echo $reclamation['description']; ?></td>
              
						      <td class="status"><span class="active">Active</span></td>
                  <td>
						      	<button type="button" class="Add" data-dismiss="alert" aria-label="">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						      <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
             
                <td>
					<form method="POST" action="ajouterreponse.php">
                        <input style="position: relative; left: 60px; top: 10px;" type="submit" value="Repondre">
						<input type="hidden" value=<?PHP echo $reclamation['id_reclamation']; ?> name="id_reclamation">
					</form>
				</td>
				<td>
                <form method="POST" action="supprimerreclamation.php">
                <input style="position: relative; left: 60px; top: 10px;" type="submit" value="Supprimer">
						<input type="hidden" value=<?PHP echo $reclamation['id_reclamation']; ?> name="id">
					</form>
					
				</td>
                </tr>
                <?php
                 }
                 ?>

                </table>
             
                
                                            
          
            </footer>
            
                </body>

