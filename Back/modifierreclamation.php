<?php
    include_once '../Models/Reclamation.php';
    include_once '../Controllers/ReclamationC.php';

    $error = "";

    // create adherent
    $reclamation = null;

    // create an instance of the controller
    $reclamationC = new ReclamationC();
    if (
        isset($_POST["id_reclamation"]) &&
		isset($_POST["type"]) &&		
		isset($_POST["date"]) && 
        isset($_POST["description"]) && 
        isset($_POST["sujet"])
    ) {
        if (
            !empty($_POST["id_reclamation"]) && 
			!empty($_POST['type']) &&
			!empty($_POST["date"]) && 
            !empty($_POST["description"]) && 
            !empty($_POST["sujet"])
        ) {
            $reclamation = new Reclamation(
                $_POST['id_reclamation'],
				$_POST['type'],
                $_POST['date'], 
				$_POST['description'],
                $_POST['sujet']
            );
            $reclamationC->modifierreclamation($reclamation, $_POST['id_reclamation']);
            header('Location:consulterreclamation.php');
        }
        else
            $error = "Missing information";
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
                            <a href="index.html" class="logo">
                                <img  src="assets/images/logo.png">
                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li class="scroll-to-section"><a href="index1.php" class="active">Acceuil</a></li>
                                
                                <li class="submenu">
                                    <a href="javascript:;">Reclamation</a>
                                    <ul>
                                        <li><a href="ajouterreclamation.php">Envoyer Reclamation</a></li>
                                        <li><a href="consulterreclamation.php">Consulter Reclamation</a></li>
                                        <li><a href="consulterreponse.php">Consulter Reponses</a></li>
                                    <li><a href="nouscontacter.php">Nous Contacter</a></li>
                                        
                                        
                                    </ul>
                                </li>
                                
                                <li style="background-color: white; color: black; position: relative; right: 2px;"><a href="inscription.html">s'inscrire</a></li>
                            
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
                <div style="background-color: rgb(44, 44, 44); height: 800px;">
                <?php
			if (isset($_POST['id_reclamation'])){
				$reclamation = $reclamationC->recupererreclamation($_POST['id_reclamation']);
				
		?>
         <form action="" method="POST">
                                       <table style="position: relative; left: 550px;">
                                       <tr>
                                              <td style="color: white; position: relative; top: 11px;"><label for="id_reclamation">ID</label></td>
                                               <td style="position: relative; left: 25px; top: 3px;"><input type="number" name="id_reclamation" id="id_reclamation" value="<?php echo $reclamation['id_reclamation']; ?>"></td>
                                            </tr>
                                            <tr >
                                               <td style="color: white; top: 30px; position: relative;"><label for="type">Type de Reclamation</label></td>
                                               <td style="color: white; position: relative; left: 20px; top: 27px;"><input type="text" name="type" value="type" id="type" value="<?php echo $reclamation['type']; ?>" ></td>
                                               
                                           </tr>
                                           <tr>
                                               <td style="color: white; position: relative; top: 42px;"><label for="date">Date</label></td>
                                               <td style="position: relative; left: 25px; top: 38px;"><input type="date" name="date" id="date" value="<?php echo $reclamation['date_reclamation']; ?>"></td>
                                           </tr>
                                           <tr>
                                               <td style="color: white ; position: relative; top: -41px;"><Label  for="description">Description</Label></td>
                                               <td style="position: relative; left: 25px; top: 75px;"><textarea name="description" id="description" cols="50" rows="10"  ><?php echo $reclamation['description']; ?></textarea></td>
                                           </tr>
                                            a
                                       
                                        
                                           <tr>
                                               <td style="color: white; position: relative; top: 110px;"><label for="sujet">Sujet</label></td>
                                               <td style="position: relative; left: 25px; top: 100px;"><input type="text" name="sujet" id="sujet" value="<?php echo $reclamation['sujet']; ?>"></td>
                                           </tr>
                                        
                                           <tr>
                                               <td ><input style="position: relative; left: 195px; top: 121px;" type="submit" value="Modifier"></td>
                                               <td><input style="position: relative; left: 118px; top: 121px;" type="reset" value="Annuler"></td>
                                           </tr>
                                           </table>
        </form>
		<?php
		}
		?>
   
</body>
</html>

