<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
        require_once("../includes/classes/Category.php");

        $cat = new Category($con);
    
       
        $title = $_POST["title"];
        

        echo $cat->add_cat($title);

       
  


 ?>