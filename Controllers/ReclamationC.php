<?php
session_start();
include_once '../config.php';
include_once '../Models/Reclamation.php';

class ReclamationC{
   
    function supprimerreclamation($Id){
        $sql="DELETE FROM reclamation WHERE id_reclamation=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $Id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}

    }
    function ajouterreclamation($reclamation){
        
        $sql="INSERT INTO  reclamation (id_reclamation,type, date_reclamation, description, sujet) 
        VALUES (:id_reclamation,:type,:date_reclamation,:description,:sujet)";
        $db = config::getConnexion();
        
        try{
            
           
            $query = $db->prepare($sql);
            $query->execute([
                'id_reclamation' => $reclamation->getid_reclamation(),
                'type' => $reclamation->gettype(),
                'date_reclamation' => $reclamation->getdate(),
                'description' => $reclamation->getdescription(),
               
                'sujet' => $reclamation->getsujet(),
                

                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }

    function recupererreclamation($Id){
        $sql="SELECT * from reclamation where id_reclamation=$Id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $reclamation=$query->fetch();
            return $reclamation;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierreclamation($reclamation, $id_reclamation){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    type= :type, 
                    date_reclamation= :date, 
                    description= :description, 
                    sujet=:sujet
                WHERE id_reclamation= :id'
            );
            $query->execute([
                'id_reclamation' =>$reclamation->getid_reclamation(),
                'type' => $reclamation->gettype(),
                'date' => $reclamation->getdate(),
                'description' => $reclamation->getdescription(),
                'sujet' => $reclamation->getsujet(),
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function afficherreclamation1(){
        $sql="SELECT * FROM reclamation ";
        $db = config::getConnexion();
       
        try{
            $query=$db->prepare($sql);
            $query->execute();
            

            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function rechercherreclamation($id)
    {
        $requete = "select * from reclamation where id_reclamation like '%$id%'";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
   


    }
    ?>
