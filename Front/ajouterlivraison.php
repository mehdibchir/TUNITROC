<?PHP
include_once "../Controllers/livraisonC.php";
include_once "../Models/livraison.php";
include_once "../config.php";

$livraisonC=new livraisonC();

if (
    
    isset($_POST["dateLivraison"]) &&
    isset($_POST["telephone"]) &&
    isset($_POST["adresse"]) 
   
) {
        $livraison = new livraison(
           
            $_POST['dateLivraison'],
            $_POST['telephone'],
            $_POST['adresse']
  
        );
        $livraisonC-> AjouterLivraison($livraison);
        header('Location:AfficherLivraisons.php');
    }
    else
        $error = "Missing information";

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>TUNITROC</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"> 
     google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
                   ['IdLivraison','adresse'],
                   <?php
                   $sql="SELECT * FROM livraison";
                   $fire=mysqli_query($con,$sql);
                   while($chat=mysqli_fetch_array($fire)){
                     echo "['".$chat["IdLivraison"]."',".$chat["adresse"]."],";
                   }
                  ?>
                  ]);

        var options = 
          title: 'Les livraisons par rapport à leurs adresses',
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      
     </script>

   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header class="full_bg">
         <!-- header inner -->
         <div class="header">
            <div class="header_top">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3">
                        <ul class="contat_infoma">
                           <li><i class="fa fa-phone" aria-hidden="true"></i> Call : +01 12345678909</li>
                        </ul>
                     </div>
                     <div class="col-md-6">
                        <ul class="social_icon_top text_align_center  ">
                           <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                     <div class="col-md-3">
                        <ul class="contat_infoma text_align_right">
                           <li><a href="Javascript:void(0)"> <i class="fa fa-phone" aria-hidden="true"></i> mehdi.bchir@esprit.tn</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="header_bottom">
                        <div class="row">
                           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                              <div class="full">
                                 <div class="center-desk">
                                    <div class="logo">
                                       <a href="index.html">TUNITROC</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                              <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                                 </button>
                                 <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                       <li class="nav-item ">
                                          <a class="nav-link" href="index.html">Home</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="about.html">About</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="project.html">project</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="staff.html">staff</a>
                                       </li>
                                       <li class="nav-item active">
                                          <a class="nav-link" href="contact.html">ajoutez un produit</a>
                                       </li>
                                    </ul>
                                 </div>
                                 <ul class="search">
                                    <li><a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                 </ul>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
      </header>
      <li> 
        <?php
              	require_once ("compteur.php");
                 ajouter_vue();
                $vues=nombre_vues();
        ?>
         <h6>Il ya <?= $vues ?> visite(s) sur le site TUNITROC </h6>
        </li>
      <div id="piechart" style="width: 900px; height: 500px;"></div>
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>ajoutez une livraison</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-6 padding_right0">
                  <form id="request" class="main_form", method="post">
                     <div class="row">
                        <fieldset>
                        <form name="MonForm" onsubmit="return valider()">
                        <div class="col-md-12 ">
                              <label for="NomLivraison">Nom livraison</label>
                              <input type="text" name="NomLivraison" id="NomLivraison"  require>                       
                            </div>
                           <div class="col-md-12 ">
                              <label for="date">Date livraison</label>
                              <input type="Date" name="dateLivraison" id="dateLivraison"  require>                       
                            </div>
                        
                        <div class="col-md-12">
                           <label for="telephone">Telephone</label>
                           <input type="number" name="telephone" id="telephone" placeholder="saisir telephone" require>
                                       </div>
                                       <div class="col-md-12 ">
                           <label for="adresse">Adresse livraison</label>
                           <input type="text" name="adresse" id="adresse" placeholder="veuillez saisir l'adresse" require>                       
                         </div>
                        

                                   
                        <div class="col-md-12">
                           <button type="submit" class="send_btn">valider</button>
                        </div>
                     </form> 
                     </div>
                  </form>
               </fieldset>
               </div>
               <div class="col-md-6 padding_left0">
                  <div class="map_main">
                     <div class="map-responsive">
                       <!-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="463" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-lg-3 col-md-6">
                     <a class="logo_bottom"><img src="images/logo_bottom.png" alt="#"/></a>
                     <p class="many">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou
                     </p>
                  </div>
                  <div class="col-lg-2 offset-lg-1 col-md-6">
                     <h3>QUICK LINKS</h3>
                     <ul class="link_menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html"> About</a></li>
                        <li><a href="project.html">Projects</a></li>
                        <li><a href="staff.html">Staff</a></li>
                        <li><a href="contact.html">ajoutez un produit</a></li>
                     </ul>
                  </div>
                  <div class=" col-lg-3 col-md-6">
                     <h3>INSTAGRAM FEEDS</h3>
                     <ul class="insta text_align_left">
                        <li><img src="images/inst1.png" alt="#"/></li>
                        <li><img src="images/inst2.png" alt="#"/></li>
                        <li><img src="images/inst3.png" alt="#"/></li>
                        <li><img src="images/inst4.png" alt="#"/></li>
                     </ul>
                  </div>
                  <div class=" col-lg-3 col-md-6 ">
                     <h3>SIGN UP TO OUR NEWSLETTER </h3>
                     <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">Sign Up</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <SCRIPT LANGUAGE="JavaScript">
   
    function valider() 
    {
    //var IdCategorieArticle=window.document.MonForm.IdCategorieArticle.value;
    var dateLivraison=window.document.MonForm.dateLivraison.value;
    var Telephone=window.document.MonForm.Telephone.value;
    var adresse=window.document.MonForm.adresse.value;
    var adresse=window.document.MonForm.NomLivraison.value;
       

    if((dateLivraison=="") || (Telephone=="") || (adresse=="") ||(NomLivraison=="")){
        alert ("verifier les champs");
        return false;
    } 
    if(adresse.charAt(0)<'A' || adresse.charAt(0)>'Z'){
        alert ("L'adresse doit commencer par une lettre Majuscule");
        return false;
    }
  
    if (Telephone.length<8){
      alert("Veuillez saisir numéro de Telephone valide");
      return false;
    }
    if (Telephone.length<2){
      alert("Veuillez saisirun nom valide");
      return false;
    }

    if(isNaN(Telephone)){
        alert("le numéro de telephone doit etre un entier");
        return false;
    }
 
    else return true;
}
</SCRIPT>

      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>