<?php
include '../Models/Reclamation.php';
include '../Controllers/ReclamationC.php';
session_start();
$error = "";
$reclamation=null;
$reclamationC= new ReclamationC();
if (
    
    //isset($_POST["email"]) &&
    isset($_POST["type"]) &&		
    isset($_POST["sujet"]) &&
    isset($_POST["date"]) && 
    isset($_POST["description"]) 
    
) {
    if (
        
        !empty($_POST["type"]) && 
        !empty($_POST["date"]) &&
        !empty($_POST["description"]) && 
       // !empty($_POST["email"]) && 
        !empty($_POST["sujet"])  
        
    ) {
          $reclamation = new Reclamation(
            $_POST['id_reclamation'],
          $_POST['type'],
          $_POST['date'],
          $_POST['description'], 
         // $_POST['email'],
          $_POST['sujet'],
          $_POST['status']
      );
     
      $reclamationC->ajouterreclamation($reclamation);
      header('Location:consulterreclamation.php');
  }
  }
    else
        $error = "Missing information";
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>tunitroc</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <script src="assets/js/verification.js" type="text/javascript"></script>
    
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
                            <a href="index.html" class="logo">
                                <img src="images/logo_bottom.png">
                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                               
                                
                                <li class="submenu">
                                    <a href="javascript:;">Reclamation</a>
                                    <ul>
                                        <li><a href="ajouterreclamation.php">Envoyer Reclamation</a></li>
                                        <li><a href="consulterreclamation.php">Consulter Reclamation</a></li>
                                        <li><a href="consulterreponse.php">Consulter Reponses</a></li>
                                    <li><a href="nouscontacter.php">Nous Contacter</a></li>
                                        
                                        
                                    </ul>
                                </li>
                                
                                <li style="background-color: white; color: black; position: relative; right: 2px;"><a href="deconnexion.php">se déconnecter</a></li>
                            
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
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
            </div>
        
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
                <div style="background-color: rgb(44, 44, 44); height: 600px;">
                <br>
                <br>
                <br>
                <script>
  function validateChar(a) {
    const pattern1 = /^[a-zA-Z]+$/
  
    return pattern1.test(a.key )
  }
  </script>
                
                                   <form action="" method="POST"  name="ajout">
                                       <table style="position: relative; left: 550px;">
                                       <!--<tr>
                                               <td style="color: white; position: relative; top: -49px;"><label for="email">Email</label></td>
                                               <td style="position: relative; left: 25px; top: -54px;"><input type="email" name="email" id="email"  value="<?php echo $_SESSION['email'];?>" readonly></td>
                                               
                                           </tr>
-->
                                           <tr >
                                               <td style="color: white; top: -42px; position: relative;"><label for="type">Type de Reclamation</label></td>
                                               <td style="color: white; position: relative; left: 20px; top: -44px;"><input type="text" name="type"  id="type" onkeypress="return validateChar(event)">
                                              
                                               
                                           </tr>
                                           
                                           <tr>
                                               <td style="color: white; position: relative; top: -32px;"><label for="date">Date</label></td>
                                               <td style="position: relative; left: 25px; top: -32px;"><input type="date" name="date" id="date"></td>
                                           </tr>
                                           <tr>
                                               <td style="color: white; position: relative; top: -18px;"><label for="sujet">Sujet</label></td>
                                               <td style="position: relative; left: 25px; top: -22px;"><input type="text" name="sujet" id="sujet" onkeypress="return validateChar(event)"></td>
                                           </tr>
                                           
                                           <tr>
                                               <td style="color: white ; position: relative; top: -113px;"><Label  for="description">Description</Label></td>
                                               <td style="position: relative; left: 25px;"><textarea name="description" id="description" cols="50" rows="10" placeholder="Description et vos Remarques..."></textarea></td>
                                           </tr>
                                           <tr>
                                               <td ><button  style="position: relative; left: 195px; top: 25px;" type="submit" onclick="verif()">Envoyer</button></td>
                                               <td><input style="position: relative; left: 118px; top: 25px;" type="reset" value="Annuler"></td>
                                           </tr>
                                     
                                 
                                       </table>
                                   </form>
                                   </div>
                                   
                                   <footer>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="first-item">
                                                    <div class="logo">
                                                        <img src="assets/images/white-logo.png" alt="hexashop ecommerce templatemo">
                                                    </div>
                                                    <ul>
                                                        <li><a href="#">Petite Ariana, Tunisie</a></li>
                                                        <li><a href="#">9achech@esprit.tn</a></li>
                                                        <li><a href="#">+216 71 546 008</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h4>Shopping &amp; Categories</h4>
                                                <ul>
                                                    <li><a href="homme.html">Homme</a></li>
                                                    <li><a href="femme.html">Femme</a></li>
                                                    <li><a href="enfant.html">Enfant</a></li>
                                                    <li><a href="bebe.html">Bébé</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <h4>Liens Utiles</h4>
                                                <ul>
                                                    <li><a href="index.html">Acceuil</a></li>
                                                    <li><a href="#">A propos de <i>Rinho</i></a></li>
                                                    <li><a href="#">Aide</a></li>
                                                    <li><a href="#">Contact</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <h4>Help &amp; Information</h4>
                                                <ul>
                                                    <li><a href="inscription.html">S'inscrire</a></li>
                                                    <li><a href="ajouterreclamation.html">Reclamation</a></li>
                                                    <li><a href="evenement.html">Evénements</a></li>
                                                    <li><a href="livraison.html">Livraison</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="under-footer">
                                                    <p>Copyright © 2022 9achech Co., Ltd. All Rights Reserved. 
                                                    
                                                    <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                                
    
                                    </body>