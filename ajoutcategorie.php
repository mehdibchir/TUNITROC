<?php 
include 'entete.php';
?>

<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
        <form action="../model/ajoutcat.php" method="post">
            <label for="ajoutcategorie">nouvelle categorie</label>
            <input type="text" name="categorie" id="categorie" placeholder="veuillez saisir la categorie" require>
            <button type="submit"> ajouter</button>
        </form>    
    </div>

    </div>     
     
</div>
 </section>
     










<?php 
include 'pied.php';
?>