<?php
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
        $sql = "INSERT INTO event (title, description, image, date,nb) 
        VALUES (:title, :description, :image, :date,:nb)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $title = $event->getTitle();
            $description = $event->getDescription();
            $image = $event->getImage();
            $date = $event->getDate();
            $nb = $event->getNb();
            $req->bindValue(':title', $title);
            $req->bindValue(':description', $description);
            $req->bindValue(':image', $image);
            $req->bindValue(':date', $date);
            $req->bindValue(':nb', $nb);
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
    {$sql = "DELETE FROM event WHERE id= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
        $sql = "DELETE FROM userevent WHERE idevent= :id";
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
        $sql = "UPDATE event SET title=:title, description=:description, image=:image, date=:date , nb=:nb WHERE id=:id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $title = $event->getTitle();
            $description = $event->getDescription();
            $image = $event->getImage();
            $date = $event->getDate();
            $nb = $event->getNb();
     
            $req->bindValue(':title', $title);
            $req->bindValue(':description', $description);
            $req->bindValue(':image', $image);
            $req->bindValue(':date', $date);
            $req->bindValue(':nb', $nb);
            $req->bindValue(':id', $id);
            $s = $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
            echo " Les datas : " . $e->getTraceAsString();
        }
    }

    function getEmailsAndNumbers($idEvent)
    {
        $sql = "SELECT * from user where id in (select iduser from userevent where idevent=$idEvent);";
        $db = config::getConnexion();
        try {
            $liste = $db->query(
                $sql
            );
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }


    function afficherEvents($id,$dateD,$dateF,$words)

    {

        $dateD = $dateD!="" ? $dateD : "1950-01-01";
        $dateF = $dateF!="" ? $dateF : "2050-01-01";
        $words = $words!="" ? $words : "";
        $sql = "SELECT * , e.id in(select idevent from userevent where iduser=$id)  as 'joined'   ,(select count(*) from userevent where idevent=e.id) as 'nbp' from event e where (date >='$dateD'  and date <'$dateF')    and title like '%$words%';";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function join($idevent,$iduser)
    {
        $sql = "INSERT INTO userevent (iduser,idevent) VALUES ($iduser,$idevent);";
        $db = config::getConnexion();
        try {
            $db->query($sql);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function unjoin($idevent,$iduser)
    {
        $sql = "DELETE FROM userevent WHERE iduser=$iduser and idevent=$idevent;";
        $db = config::getConnexion();
        try {
            $db->query($sql);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function getNb($id)
    {

    }

}

?>