<?php
	include '../../config.php';
	include_once '../Model/plat.php';
	class PlatC {
		function afficherPlat(){
			$sql="SELECT * FROM plat";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerPlat($id_plat){
			$sql="DELETE FROM plat WHERE id_plat=:id_plat";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_plat', $id_plat);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
        function ajouterPlat($plat){

            $sql = "INSERT INTO plat (Nomplat, descP,categorie, img)
                      VALUES (:Nomplat, :descP, :categorie, :img)";
         $db = config::getConnexion();
         try{
             $query = $db->prepare($sql);
             $query->execute([
                 'Nomplat'=> $plat->getNomplat(),
                 'descP'=> $plat->getdescP(),
				 'categorie'=> $plat->getcategorie(),
                 'img'=> $plat->getimg()
             ]);
             header("Location: ../Views/formAjoutPlat.php");
     } catch (PDOExeption $e){
         $e->getMessage();
     }
     
         }
		function recupererPlat($id_plat){
			$sql="SELECT * from plat where id_plat=$id_plat";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$plat=$query->fetch();
				return $plat;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierPlat($plat, $id_plat){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE plat SET 
						Nomplat = :Nomplat, 
						descP = :descP, 
						categorie = :categorie,
						img = :img
					WHERE id_plat = :id_plat"
				);

				$query->execute([
                    'Nomplat' => $plat->getNomplat(),
					'descP' => $plat->getdescP(),
					'categorie' => $plat->getcategorie(),
					'img' => $plat->getimg(),
					'id_plat' => $id_plat
				]);
				header("Location: ../Views/dashboard.php");
				echo $query->rowCount() . " records UPDATED successfully <br>";

			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		function afficherPlaat(){
			$sql="SELECT * FROM plat order by id_plat desc ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:' . $e->getMessage());
			}
		}

		function afficherPlaaat(){
			$sql="SELECT * FROM plat order by categorie desc ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:' . $e->getMessage());
			}
		}

	}
?>