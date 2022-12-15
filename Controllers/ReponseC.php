<?php
include_once '../config.php';


class ReponseC{
    function afficherreclamation(){
        $sql="SELECT * FROM reclamations";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function afficherreponse(){
        $sql="SELECT * FROM reponse_reclamation";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function ajouterreponse($reponse){
        $sql="INSERT INTO  reponse_reclamation ( date_reponse, description_reponse,mail_reponse, sujet_reponse,id_reclamation) 
        VALUES (:date_reponse,:description_reponse, :mail_reponse, :sujet_reponse ,:id_reclamation)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                
                'date_reponse' => $reponse->getdate(),
                'description_reponse' => $reponse->getdescription(),
                'mail_reponse' => $reponse->getmail(),
                'sujet_reponse' => $reponse->getsujet(),
                'id_reclamation'=>$reponse->getid_reclamation()
                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
    function recupererreponse($Id){
        $sql="SELECT * from reponse_reclamation where id_reponse=$Id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $reponse=$query->fetch();
            return $reponse;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierreponse($reponse, $Id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse_reclamation SET 
                    
                    date_reponse= :date, 
                    description_reponse= :description, 
                    mail_reponse= :mail, 
                    sujet_reponse=:sujet
                WHERE id_reponse= :id'
            );
            $query->execute([
                'id' => $Id,
                'date' => $reponse->getdate(),
                'description' => $reponse->getdescription(),
                'mail' => $reponse->getmail(),
                'sujet' => $reponse->getsujet(),
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function supprimerreponse($Id){
        $sql="DELETE FROM reponse_reclamation WHERE id_reponse=:Id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Id', $Id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}

    }

    
    function afficherreponse1($email){
        $sql="SELECT * FROM reponse_reclamation where mail_reponse=('$email')";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }

}
}
