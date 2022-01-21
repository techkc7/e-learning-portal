<?php
class OrderProvider {

    public static function getOrder($con,$user) {

        $sql = "SELECT * FROM orders ";

        if($user != null) {
            $sql .= "WHERE userid=:user ";
        }

      

        $query = $con->prepare($sql);

        if($user != null) {
            $query->bindValue(":user", $user);
        }

    
        $query->execute();

        $result = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Orders($con, $row['order_id']);
        }

        return $result;
    }

    
   

}
?>