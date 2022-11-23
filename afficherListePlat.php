<?php
include '../Controller/platC.php';
$platc=new platc();
$liste=$platc->afficherPlat();
?>

<html>
    <head></head>
    <body>
        <button>
            <a href="ajouterPlat.php">Ajouter </a>
        </button>
        <table border="1" align="center">
            <tr>
            <th>Id Plat</th>
            <th>Nom plat</th>  
                <th>Description</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Modifier</th>
                <th>Supprimer</th>
             </tr>
             <?php
                foreach($liste as $plat) {
             ?>
             <tr>
                 <td> <?php echo $plat['id_plat']; ?></td>
                 <td> <?php echo $plat['Nomplat']; ?></td>
                 <td> <?php echo $plat['descP']; ?></td>
                 <td> <?php echo $plat['prix']; ?></td>
                 <td> <?php echo $plat['img']; ?></td>

                 <td>
                    <a href="modifierPlat.php?id_plat=<?php echo $plat['id_plat'];
                       ?>"> Modifier </a> 
                 </td> 
                 <td> 
                    <a href="supprimerPlat.php?id_plat=<?php echo $plat['id_plat'];
                       ?>">Supprimer </a>
                 </td>
             </tr>
             <?php
                }
             ?>
         </table>
    </body>
</html>