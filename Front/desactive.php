<?php
  require_once '../config.php';
    // Connect to database 
   // $con=mysqli_connect("localhost","root","","tbl_users");
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['id_reclamation'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $reclamation_id=$_GET['id_reclamation'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE `reclamation` SET 
            `status`=0 WHERE id_reclamation='$reclamation_id'";
  
        // Execute the query
        mysqli_query($con,$sql);
    }
  
    // Go back to course-page.php
    header('location: Users.php');
?>