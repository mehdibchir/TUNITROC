<?php 
include 'entete.php';

?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
        <form action="../model/ajoutarticle.php" method="post">
            <label for="nom_article">Nom de l'article</label>
            <input type="text" name="nom_article" id="nom_article" placeholder="veuillez saisir le nom" require>


            <!--<label for="categorie">Categorie</label>
            <select name="categorie" id="categorie">
                <option value="ordinateur">ordinateur</option>
                <option value="sport">sport</option>
                <option value="accessoir ">accessoir</option>
            </select>-->
            

      
            <?php
include '../model/categorie.php';
include '../model/conn.php' ;
?>
<label for="categorie">Categorie</label>
<select name="courseName">
   <option>saisir la categorie</option>
  <?php 
  foreach ($options as $option) {
  ?>
    <option><?php echo $option['categorie']; ?> </option>
    <?php 
    }
   ?>
</select>
            <label for="quantite">Quantite</label>
            <input type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite" require>


            <label for="id_propriétaire	">id-propriétaire</label>
            <input type="number" name="id_propriétaire" id="id_propriétaire" placeholder="id_propriétaire" require >

            <label for="date_de_publication">date de publication</label>
            <input type="date" name="date_de_publication" id="date_de_publication" placeholder="date de publication" require>

            <label for="disponibilite">disponibilité</label>
            <input type="int" name="disponibilite" id="disponibilite" placeholder="disponibilite"  require>

            <label for="img">image</label>
            <input type="file" name="img" id="img" placeholder="img"  require>

            
            <button type="submit"> valider</button>
            <?php 
            if(!empty($_SESSION['message']['text'])){
            ?>  
            <div class="alert <?=$_SESSION['message']['type']?>">
          <?= $_SESSION['message']['text'] ?>
        </div>
        <?php }?>
            
        </form>    
    </div>
    <div class="box">
      <table class="mtable">
        <tr>
          <th>nom article</th>
          <th>categorie</th>
          <th>quantite</th>
          <th>id propriétaire</th>
          <th>date de publication</th>
          <th>disponibilité</th>
          <th>image</th>

        </tr>
        <?php 
        $articles=getArticle();
        if (!empty($articles)&& is_array($articles)) {
         foreach ($articles as $key =>$value){
          ?>
          <tr>
            <td><?=$value['nom_article'] ?></td>
            <td><?=$value['categorie'] ?></td>
            <td><?=$value['quantite'] ?></td>
            <td><?=$value['id_propriétaire'] ?></td>
            <td><?=$value['date_de_publication'] ?></td>
            <td><?=$value['disponibilite'] ?></td>
            <td><?=$value['img'] ?></td>
          </tr>
         <?php
         }
        } 
        
        ?>
      </table>
    </div>

    </div>     
     
</div>
 </section>
 
    <?php 
include 'pied.php';
?>