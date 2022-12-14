<?php
include_once '../Models/Reclamation.php';
require_once '../config.php';
require_once 'consulterreclamation.php';
$id=$_GET['id'];
$status=$_GET['status'];

        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                  status=1
                WHERE id_reclamation= :id'
            );
            $query->execute([
                'status' => $reclamation->getstatus(),
              
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
header('location:Useres.php')
?>