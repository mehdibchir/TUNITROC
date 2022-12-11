<?PHP
class messageController {

function ajoutermessage($message){
		$sql="INSERT INTO message (sender,receiver,message,type) VALUES (:sender,:receiver,:message,:type)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
	

        $sender=$message->getsender();
	$receiver=$message->getreceiver();
	$msg=$message->getmessage();
	$type=$message->gettype();
	

	$req->bindValue(':sender',$sender);
	$req->bindValue(':receiver',$receiver);
	$req->bindValue(':message',$msg); 
	$req->bindValue(':type',$type);
			
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichermessage(){

		$sql="SELECT * FROM message";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


	function getMessages($sender,$receiver){
		$sql = "SELECT * FROM `message` WHERE sender=$sender AND receiver=$receiver OR sender=$receiver AND receiver=$sender ORDER BY createdAt ASC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	
	}
	function supprimermessage($id){
		$sql="DELETE FROM message where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiermessage($message,$id){
		$sql="UPDATE message SET sender=:sender,receiver=:receiver,message=:message,type=:type,createdAt=:createdAt WHERE id=:id";
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);

		$sender=$message->getsender();
	$receiver=$message->getreceiver();
	$message=$message->getmessage();
	$type=$message->gettype();
	$createdAt=$message->getcreatedAt();
	
		$req->bindValue(':id',$id);

		$req->bindValue(':sender',$sender);
	$req->bindValue(':receiver',$receiver);
	$req->bindValue(':message',$message);
	$req->bindValue(':type',$type);
	$req->bindValue(':createdAt',$createdAt);
	
        $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}


	function addReaction($id,$reactionType)
	{
		$sql="UPDATE message SET reactionType=:reactionType WHERE id=:id";
		$db = config::getConnexion();
		try{		
			$req=$db->prepare($sql);
			$req->bindValue(':reactionType',$reactionType);
			$req->bindValue(':id',$id);
		
			$res=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
	}
	function recuperermessage($id){

		$sql="SELECT * from message where id=$id";
		$db = config::getConnexion();

		try{
		$liste=$db->query($sql);
		return $liste->fetch();;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	


}





?>