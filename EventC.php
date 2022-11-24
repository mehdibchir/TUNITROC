<?php
include("../../config/dbconfig.php");
class EventC
{
    function recupererEvent($id)
    {
        $sql = "SELECT * from event where id=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function ajouterEvent($event)
    {
        $sql = "INSERT INTO event (title, description, image, date) 
        VALUES (:title, :description, :image, :date)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $title = $event->getTitle();
            $description = $event->getDescription();
            $image = $event->getImage();
            $date = $event->getDate();
            $req->bindValue(':title', $title);
            $req->bindValue(':description', $description);
            $req->bindValue(':image', $image);
            $req->bindValue(':date', $date);
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    
    function afficherEvent()
    {
        $sql = "SELECT * FROM event";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerEvent($id)
    {
        $sql = "DELETE FROM event WHERE id= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierEvent($event, $id)
    {
        $sql = "UPDATE event SET title=:title, description=:description, image=:image, date=:date WHERE id=:id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $title = $event->getTitle();
            $description = $event->getDescription();
            $image = $event->getImage();
            $date = $event->getDate();
            $req->bindValue(':title', $title);
            $req->bindValue(':description', $description);
            $req->bindValue(':image', $image);
            $req->bindValue(':date', $date);
            $req->bindValue(':id', $id);
            $s = $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
            echo " Les datas : " . $e->getTraceAsString();
        }
    }

}

?>