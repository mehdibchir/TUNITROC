<?php
	include '../config.php';
	include_once '../Model/cat.php';
	class CatC {
		function afficherCat(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerCat($id_cat){
			$sql="DELETE FROM categorie WHERE id_cat=:id_cat";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_cat', $id_cat);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
        function ajouterCat($cat){

            $sql = "INSERT INTO categorie (nom, descr)
                      VALUES ( :nom, :descr )";
         $db = config::getConnexion();
         try{
             $query = $db->prepare($sql);
             $query->execute([
                 
                 'nom'=> $cat->getnom(),
				 'descr'=> $cat->getdescr()
               
             ]);
             header("Location: ../Views/formAjoutPlat.php");
     } catch (PDOExeption $e){
         $e->getMessage();
     }
     
         }
		function recupererCat($id_cat){
			$sql="SELECT * from categorie where id_cat=$id_cat";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$cat=$query->fetch();
				return $cat;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierCat($cat, $id_cat){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE categorie SET 
						
						nom = :nom, 
						descr = :descr,
					
					WHERE id_cat = :id_cat"
				);

				$query->execute([
                  
					'nom' => $cat->getnom(),
					'descr' => $cat->getdescr(),
					
					'id_cat' => $id_cat
				]);
				header("Location: ../Views/dashboard2.php");
				echo $query->rowCount() . " records UPDATED successfully <br>";

			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

	}
?>