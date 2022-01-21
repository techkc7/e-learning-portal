<?php
require_once("../includes/config/db.php");
//require_once("check-login.php");
  
 
  if (isset($_POST["delid"])) {
   $d=$_POST["delid"];
    $idx = array_search($d,$_SESSION['product']);
    
  unset($_SESSION['product'][$idx]);
 echo count($_SESSION['product']);
      return;
   
}
 
if(isset($_POST["cid"])) {
    $i=$_POST["cid"];
    if (!isset($_SESSION['product'])) {
        $_SESSION['product']=array();
    }
     array_push($_SESSION['product'],$i);
    
    // $uid=$_POST["uid"];
    // $prc=$_POST["price"];
    // $query = $con->prepare("INSERT INTO `carts`(`course_id`, `price`, `userid`)VALUES(:cid, :prc,:userid)");
    // $query->bindValue(":cid", $cid);
    // $query->bindValue(":prc", $prc);
    // $query->bindValue(":userid", $uid);

   

   
        echo count($_SESSION['product']);
           return;
     }
  

?>