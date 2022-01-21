<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
        require_once("../includes/classes/User.php");
        require_once("../includes/classes/Course.php");

        $del = new Course($con);
    
        $id = $_POST['delid'];
    
        

        echo $del->deleteCourse($id);

       
  


 ?>