<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
       require_once("../../includes/classes/OrderContainers.php");
       require_once("../../includes/classes/OrderProvider.php");
       require_once("../../includes/classes/Orders.php");

      
                   $od = new OrderContainers($con);

                    echo $od->showAllOrder(); 

      

       
  


 ?>