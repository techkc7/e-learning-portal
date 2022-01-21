<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
        require_once("../includes/classes/User.php");

      
        $user=new User($con);

         echo $user->getAllUsers();

      

       
  


 ?>