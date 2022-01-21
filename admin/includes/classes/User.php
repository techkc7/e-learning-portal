<?php
class User {
    private $con,$sqlData;

    public function __construct($con) {
        $this->con = $con;
    }
    public function getAllUsers(){
        $query = $this->con->prepare("SELECT * FROM users ORDER BY 1 DESC");
       
        $query->execute();

         $html='  <div class="card mb-4">
         <div class="card-header">
			<i class="fas fa-table mr-1"></i>

			</div>
           
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

               <thead>


                 <tr>
                   <th style="font-size:14px;">user id</th>
                   
                   <th style="font-size:14px;">name</th>
                   <th style="font-size:14px;">Username</th>
                   <th style="font-size:14px;">Email</th>
                   <th style="font-size:14px;">delete</th>
                  
                   
                 </tr>
               </thead>

               <tbody>
           ';
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
             $name=$row['name'];
             $u=$row['username'];
             $e=$row['email'];
             $id=$row['userid'];
            $html.="
               <tr> <td> $id</td>
                <td> $name</td>
                <td> $u</td>
                <td> $e</td>
                <td> <span data-id='$id' class='btn btn-danger text-white del' > Delete</span></td>
                </tr>
             ";
        }
               echo $html."
               </tbody>
             </table>
           </div>
         </div>";
        
    }

    public function deleteUser($id){
        $query = $this->con->prepare(" delete from users where userid=:id");
        $query->bindValue(":id", $id);
         if($query->execute()){
        
                return json_encode(array("statusCode"=>200));}
           
            else {
                return json_encode(array("statusCode"=>201));
            }
         }
        

        
        
    

}
   ?>