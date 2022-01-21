<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
        require_once("../includes/classes/User.php");

        $del = new User($con);
    
        $id = $_POST['id'];
    
        

        //echo $del->deleteUser($id);

       
  


 ?>