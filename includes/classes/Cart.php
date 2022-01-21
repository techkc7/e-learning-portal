<?php
class Cart {

    private $con, $user,$isCart,$price,$item=array();

    public function __construct($con, $input) {
        $this->con = $con;

      
            $this->user = $input;
       
    
            $query = $this->con->prepare("SELECT * FROM carts WHERE userid=:id");
            $query->bindValue(":id", $input);
            $query->execute();
            $this->isCart= $query->rowCount();
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $this->price += $row['price'];
                $this->item[]= $row['course_id'];
            }
           
        
    }

    public function getUser() {
        return $this->user;
    }
    public function getPrice() {
        return $this->price;
    }

    public function getItems() {
        return $this->item;
    }
    public function isCart() {
        return $this->isCart;
    }

    
    public function deleteCart() {
        $query = $this->con->prepare("delete  FROM carts WHERE userid=:id");
        $query->bindValue(":id", $this->getUser());
       
       if ($query->execute()) {
        return true;
       } 

    
      

    }
}
?>