<?php
require_once("../includes/config/db.php");
require_once("../includes/classes/Entity.php");

if(!isset($_SESSION['userid'])) {
  
  echo "Login First...";
}
else{

if (isset($_SESSION['product'])) {
   $uid=$_SESSION['userid'];
  $data = $_SESSION['product'];
  $flag=0;
  foreach($data as $pro) {
 $entity = new Entity($con, $pro);

 $prc=$entity->getPrice();
 $cid=$entity->getId();
 
    

    $query = $con->prepare("INSERT INTO `carts`(`course_id`, `price`, `userid`)VALUES(:cid, :prc,:userid)");
    $query->bindValue(":cid", $cid);
    $query->bindValue(":prc", $prc);
    $query->bindValue(":userid", $uid);
     if ( $query->execute()) {
       unset($_SESSION['product']);
      $flag=1;
     }
    
   
  }
  if ($flag) {
    echo 1;
  }else
     echo "Something went wrong!!!";
   
       
     }
    }