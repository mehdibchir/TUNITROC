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
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                          
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li class="scroll-to-section"><a href="index.html" class="active">Acceuil</a></li>
                               
                                <li class="submenu">
                                    <a href="javascript:;">Reclamation</a>
                                    <ul>
                                        <li><a href="ajouterreclamation.php">Envoyer Reclamation</a></li>
                                        <li><a href="consulterreclamation.php">Consulter Reclamation</a></li>
                                        <li><a href="consulterreponse.php">Consulter Reponse</a></li>
                                        
                                        
                                    </ul>
                                </li>
                                
                                <li style="background-color: white; color: black; position: relative; right: 2px;"><a href="deconnexion.php">Se Deconnecter</a></li>
                            
                                <li class="scroll-to-section">
                                <a href="ajouter_dans_panier.html">
                                <img src="assets/images/ajouter-un-panier.png" alt=""  height ="30" width="30">
                                </a>
                                </li>
        
                            </ul>   
                            
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        
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
                     <th style="color: gold;">Status</th>

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
                <td style="color:white;"><?php echo $reclamation['status'];?></td>
            
						    
                       
                <td>
					<form method="POST" action="modifierreclamation.php">
						<input type="image" id="image" src="./assets/images/modifier.png">
						<input type="hidden" value=<?PHP echo $reclamation['id_reclamation']; ?> name="id">
					</form>
				</td>
                <td>
					<form method="POST" action="excel.php">
						<input type="image" id="image" value="Excel">
						<input type="hidden" value=<?PHP echo $reclamation['id_reclamation']; ?> name="id">
					</form>
				<td>

                        <a href="supprimerreclamation.php?id=<?PHP echo $reclamation['id_reclamation']; ?>">Supprimer</a>
					
                    <?php
            
                if( $reclamation['status']==1){
                    echo '<p><a href="desactive.php?id= '.$reclamation['id_reclamation'].' &status=1">Repondu</a></p>';

                } else {
                    echo '<p><a href="active.php?id= '.$reclamation['id_reclamation'].' &status=0">Pas de Reponse</a></p>';
                }?>
					
				</td>
                </tr>
                <?php
                 }
                 ?>

                </table>
             
                
                                            
            </div>
           
            
                </body>

                <?php
