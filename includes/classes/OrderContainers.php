<?php
class OrderContainers {

    private $con; 

    public function __construct($con) {
        $this->con = $con;
        
    }

    public function showAllOrder() {
        $query = $this->con->prepare("SELECT * FROM orders");
        $query->execute();

        $html = "<div class='card mb-4'>
        <div class='card-header'>
        <i class='fas fa-table mr-1'></i>
        
        </div>
        <div class='card-body'>
        <div class='table-responsive'>
        <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
        
        <thead class='thead-light'>
          <tr>
          <th>#</th>
          <th>User id</th>
          
          <th>Order ID</th>
          <th> Amount</th>
           <th>Date</th>
           <th>Status</th>
          </tr>
          </thead>
          <tbody>";
          $i=0;
         
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $i++;
          
            $html .=  $this->getHtml($row,$i,$d="d-block");
        }

        return $html . "  </tbody>

        </table>
        </div>
        </div>
        </div>";
    }

    public function showUserOrder($userid) {
        $query = $this->con->prepare("SELECT * FROM orders WHERE userid=:id");
        $query->bindValue(":id", $userid);
        $query->execute();
       
        $html = "<div class='card mb-4'>
        <div class='card-header'>
        <i class='fas fa-table mr-1'></i>
        
        </div>
        <div class='card-body'>
        <div class='table-responsive'>
        <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
        
        <thead class='thead-light'>
          <tr>
          <th>#</th>
          <th>Order ID</th>
          <th> Amount</th>
           <th>Date</th>
           <th>Status</th>
          </tr>
          </thead>
          <tbody>";
        $i=0;
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $i++;
            $html .= $this->getHtml($row,$i,$d="d-none");
        }

        return $html . "  </tbody>

        </table>
        </div>
        </div>
        </div>";
    }


    private function getHtml($sqlData,$x,$d) {
         $i=$x;
        $userid = $sqlData["userid"];
        $od = $sqlData["order_id"];
        $amt = $sqlData["amt"];
        $date = $sqlData["date"];
        $st = $sqlData["status"];
       
            $order = OrderProvider::getOrder($this->con,$userid);
           

        if(sizeof($order) == 0) {
            return;
        }
                  
       
                return " 
                <tr>
                <td> $i</td>
                <td class='$d'> $userid</td>
                <td> $od</td>
                <td> $amt</td>
                <td> $date</td>
                  <td> $st</td>
                    
              </tr>
                ";
          
    }

}
?>