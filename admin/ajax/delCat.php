<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
        require_once("../includes/classes/User.php");
        require_once("../includes/classes/Category.php");

        $del = new Category($con);
    
        $id = $_POST['delid'];
    
        

        echo $del->delCategory($id);

       
  


 ?>