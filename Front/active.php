<?php
include '../Models/Reclamation.php';
include '../Controllers/ReclamationC.php';
//require_once  "model/Utilisateur.php";
//require_once 'controller/UtilisateurC.php';
require_once  "consulterreclamation.php";
// Connect to database 
    //$con=mysqli_connect("localhost","root","tbl_users");
  
    // Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['id_reclamation'])){
        $error = "";
        $reclamation=null;
        $reclamationC= new ReclamationC();
        $result=$reclamationC->recupererreclamation($_GET['id_reclamation']);
        foreach($result as $row){
            $id=$row['id_reclamation'];
            $status=$row['id_statusstatus'];
           
  
        // Store the value from get to a 
        // local variable "course_id"
        $reclamation_id=$_GET['id_reclamation'];
  
        // SQL query that sets the status
        // to 1 to indicate activation.
        $reclamation1=new Reclamation($_POST['type'],$_POST['date'],$_POST['description'],$_POST['sujet'],$_POST['status']);
    
       // $reclamationC->modifierUtilisateur2($utilisateur1,$user_id);
       
        //echo $_POST['id_ini'];
    
        header('Location: consulterreclamaion.php');
         $_SESSION['msg'] = 'updated!';
    }
		
}
    // Go back to course-page.php
    header('location:Users.php');
?>