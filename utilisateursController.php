<?PHP
class utilisateursController {

	function ajouterutilisateurs($utilisateurs){
		$sql="INSERT INTO utilisateurs (nom,prenom,email,password,telephone,role,image) VALUES (:nom,:prenom,:email,:password,:telephone,:role,:image)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
	

        $nom=$utilisateurs->getnom();
	$prenom=$utilisateurs->getprenom();
	$email=$utilisateurs->getemail();
	$password=$utilisateurs->getpassword();
	$telephone=$utilisateurs->gettelephone();
	$role=$utilisateurs->getrole();
	$image=$utilisateurs->getimage();
	

	$req->bindValue(':nom',$nom);
	$req->bindValue(':prenom',$prenom);
	$req->bindValue(':email',$email);
	$req->bindValue(':password',$password);
	$req->bindValue(':telephone',$telephone);
	$req->bindValue(':role',$role);
	$req->bindValue(':image',$image);
			
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherutilisateurs(){

		$sql="SELECT * FROM utilisateurs";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerutilisateurs($id){
		$sql="DELETE FROM utilisateurs where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierutilisateurs($utilisateurs,$id){
		$sql="UPDATE utilisateurs SET nom=:nom,prenom=:prenom,email=:email,password=:password,telephone=:telephone,role=:role,image=:image WHERE id=:id";
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);

		$nom=$utilisateurs->getnom();
	$prenom=$utilisateurs->getprenom();
	$email=$utilisateurs->getemail();
	$password=$utilisateurs->getpassword();
	$telephone=$utilisateurs->gettelephone();
	$role=$utilisateurs->getrole();
	$image=$utilisateurs->getimage();
	
		$req->bindValue(':id',$id);

		$req->bindValue(':nom',$nom);
	$req->bindValue(':prenom',$prenom);
	$req->bindValue(':email',$email);
	$req->bindValue(':password',$password);
	$req->bindValue(':telephone',$telephone);
	$req->bindValue(':role',$role);
	$req->bindValue(':image',$image);
	
        $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}




	function modifierImage($image,$id){
		$sql="UPDATE utilisateurs SET image=:image WHERE id=:id";
		$db = config::getConnexion();
		try{		

			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			$req->bindValue(':image',$image);
		
			$s=$req->execute();
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}

	function modifierPassword($password,$id){
		$sql="UPDATE utilisateurs SET password=:password WHERE id=:id";
		$db = config::getConnexion();
		try{		

			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			$req->bindValue(':password',$password);
		
			$s=$req->execute();
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
	}

	function modifierRole($id,$role){
		$sql="UPDATE utilisateurs SET role=:role WHERE id=:id";
		$db = config::getConnexion();
		try{		

			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			$req->bindValue(':role',$role);
		
			$s=$req->execute();
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
	}

	function recupererutilisateurs($id){

		$sql="SELECT * from utilisateurs where id=$id";
		$db = config::getConnexion();

		try{
		$liste=$db->query($sql);
		return $liste->fetch();;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function searchUtilisateurs($search)
	{
		$sql = "SELECT * FROM utilisateurs WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%' OR role LIKE '%$search%'";
		$db = config::getConnexion();

		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	


}





?>