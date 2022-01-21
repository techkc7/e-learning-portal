<?php
class Orders {

    private $con, $user,$sqlData;

      

    public function __construct($con, $input) {
        $this->con = $con;
            $this->user = $input;
            
            $query = $this->con->prepare("SELECT *FROM orders WHERE userid=:id");
            $query->bindValue(":id", $input);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }
   
    
    public function insertOrder($amt, $name, $status) {
        
       
        
      $query = $this->con->prepare("INSERT INTO orders(amt, userid, course_id,status)
                                      VALUES (:amt, :un, :names, :sts)");
      $query->bindValue(":amt", $amt);
     
      $query->bindValue(":un", $this->user);
      $query->bindValue(":names", $name);
      $query->bindValue(":sts", $status);

      return $query->execute();
  }
  public function insertPayment($pid, $oid, $signhash,$amt) {
        
       
        
    $query = $this->con->prepare("INSERT INTO `payments`(`payment_id`,  `order_id`, `signature_hash`,`userid`,`amt`)VALUES(:pid, :oids, :hashs, :un ,:amt)");
   
   
    $query->bindValue(":pid", $pid);
    $query->bindValue(":oids", $oid);    
    $query->bindValue(":hashs", $signhash);
    $query->bindValue(":un", $this->user);
    $query->bindValue(":amt", $amt);

    return $query->execute();
}
public function income()
{
  $query = $this->con->prepare("SELECT sum(amt) as total from payments");
 
  $query->execute();
  $row = $query->fetch(PDO::FETCH_ASSOC);
  $sum = $row['total'];
   echo $sum;
}

public function income_mthly()
{
  $d=date('d');
  $query = $this->con->prepare("SELECT sum(amt) as total from payments where date between DATE(NOW())-INTERVAL $d DAY AND DATE(NOW())  ");
 
  $query->execute();
  $row = $query->fetch(PDO::FETCH_ASSOC);
  $sum = $row['total'];
   echo $sum;
}
public function sell()
{
  $query = $this->con->prepare("SELECT count(course_id) as total from orders");
 
  $query->execute();
  $row = $query->fetch(PDO::FETCH_ASSOC);
  $sum = $row['total'];
   echo $sum;
}
public function userCount()
{
  $query = $this->con->prepare("SELECT count(userid) as total from users");
 
  $query->execute();
  $row = $query->fetch(PDO::FETCH_ASSOC);
  $sum = $row['total'];
   echo $sum;
}
  
     public function allEnrollCourse()
    {
      $query = $this->con->prepare("SELECT * FROM orders WHERE status=:st and userid=:id");
      $query->bindValue(":id",$this->user);
      $query->bindValue(":st","accepted");
      $query->execute();
       $count= $query->rowCount();
       return $count;
    }
    public function viewCourse()
    {
      $query = $this->con->prepare("SELECT * FROM orders WHERE status=:st and userid=:id");
      $query->bindValue(":id",$this->user);
      $query->bindValue(":st","accepted");
      $query->execute();
      $rst=array();
      while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
         $id=$row['course_id'];
        
         $rst[]=$id;
      }
      return $rst;
    }
  
  
    public function getId() {
      return $this->sqlData["order_id"];
  }
  public function getAmount() {
      return $this->sqlData["amt"];
  }


  public function getCourseId() {
      return $this->sqlData["course_id"];
  }

  public function getStatus() {
      return $this->sqlData["status"];
  }

  public function getDate() {
      return $this->sqlData["date"];
  }

       

}
?>