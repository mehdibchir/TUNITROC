<?php
include '../Controller/catC.php';
$catc=new catc();
$liste=$catc->afficherCat();
?>

<html>
    <head></head>
    <body>
        <button>
            <a href="ajouterCat.php">Ajouter </a>
        </button>
        <table border="1" align="center">
            <tr>
            <th>Id cat</th>
            <th>Id plat</th>  
                <th>nom</th>
                <th>Description</th>
               
                <th>Modifier</th>
                <th>Supprimer</th>
             </tr>
             <?php
                foreach($liste as $cat) {
             ?>
             <tr>
                 <td> <?php echo $cat['id_cat']; ?></td>
                
                 <td> <?php echo $cat['nom']; ?></td>
                 <td> <?php echo $cat['descr']; ?></td>
                

                 <td>
                    <a href="modifierCat.php?id_cat=<?php echo $cat['id_cat'];
                       ?>"> Modifier </a> 
                 </td> 
                 <td> 
                    <a href="supprimerCat.php?id_cat=<?php echo $cat['id_cat'];
                       ?>">Supprimer </a>
                 </td>
             </tr>
             <?php
                }
             ?>
         </table>
    </body>
</html>