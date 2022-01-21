<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
        require_once("../includes/classes/Course.php");

      
        $c=new Course($con);

         echo $c->getAllCourse();

      

       
  


 ?>