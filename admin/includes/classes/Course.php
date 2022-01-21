<?php
class Course {

    private $con;

    public function __construct($con) {
        $this->con = $con;


    }

    public function add_course($name,$cat,$img,$vid,$price) {
        $query = $this->con->prepare("INSERT INTO `course`( `name`, `cat_id`, `prev_img`, `prev_video`, `price`)
        VALUES (:nm, :cid, :img, :vid, :price)");
        $query->bindValue(":nm", $name);
        $query->bindValue(":cid", $cat);
        $query->bindValue(":img", $img);
        $query->bindValue(":vid", $vid);
        $query->bindValue(":price", $price);

       if($query->execute()){
        return 1;
       }else{
        return 0;
       }
    }
    
    
    public function upd_course($name,$cat,$img,$vid,$price,$id) {
      
        $query = $this->con->prepare("UPDATE `course` SET name=:nm,cat_id=:cid,prev_img=:img,prev_video=:vid,price=:price
        WHERE id=:id");
        $query->bindValue(":nm", $name);
        $query->bindValue(":cid", $cat);
        $query->bindValue(":img", $img);
        $query->bindValue(":vid", $vid);
        $query->bindValue(":price", $price);
        $query->bindValue(":id", $id);

       if($query->execute()){
        return 1;
       }else{
        return 0;
       }
    }

    public function addVideo($name,$desc,$vid,$vn,$cid) {
        $query = $this->con->prepare(" INSERT INTO `videos`(`title`, `description`, `filepath`,  `course_id`,`notes`)
        VALUES (:nm, :ds, :vid, :cid,:vn)");
        $query->bindValue(":nm", $name);
        $query->bindValue(":ds", $desc);
       
        $query->bindValue(":vid", $vid);
        $query->bindValue(":vn", $vn);
        $query->bindValue(":cid", $cid);

        if($query->execute()){
          return 1;
         }else{
          return 0;
         }
    }

    public function updVideo($name,$desc,$vid,$vn,$cid,$id) {
        $query = $this->con->prepare("UPDATE `videos` SET title=:nm,description=:ds,filepath=:vid,notes=:vn,course_id=:cid
        WHERE video_id=:id");
        $query->bindValue(":nm", $name);
        $query->bindValue(":ds", $desc);
       
        $query->bindValue(":vid", $vid);
        $query->bindValue(":vn", $vn);
        $query->bindValue(":cid", $cid);
        $query->bindValue(":id", $id);

        if($query->execute()){
          return 1;
         }else{
          return 0;
         }
    }

    public function get_course_id() {
        $query = $this->con->prepare("SELECT * FROM course");
        $query->execute();
  
       
  
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $c_id=$row ['id'];
            $name=$row ['name'];
            echo"<option class='' value='$c_id'>$name</option>";
        }

      
    }

    public function deleteCourse($del){
      $query = $this->con->prepare(" delete from course where id=:id");
      $query->bindValue(":id", $del);
       if($query->execute()){
      
              return 1;
       }
          else {
              return 0;
          }
       }
      

    public function deleteCourseVid($del){
      $query = $this->con->prepare(" delete from videos where video_id=:id");
      $query->bindValue(":id", $del);
       if($query->execute()){
      
              return 1;
       }
          else {
              return 0;
          }
       }
      
  

    public function getAllCourse(){
        $query = $this->con->prepare("SELECT * FROM course ORDER BY 1 DESC");
       
        $query->execute();
        
        $html=' <div class="card mb-4">
        <div class="card-header">
        <i class="fas fa-table mr-1"></i>
  
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

              <thead>


                <tr>
                  <th style="font-size:14px;"> id</th>
                  
                  <th style="font-size:14px;">name</th>
                  <th style="font-size:14px;">category</th>
                  <th style="font-size:14px;">price</th>
                  <th style="font-size:14px;">preview image</th>
                  <th style="font-size:14px;">preview Video</th>
                  <th style="font-size:14px;">Edit</th>
                  <th style="font-size:14px;">delete</th>
                 
                  
                </tr>
              </thead>

              <tbody>
              
          

              ';

       
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
           $html.=$this->getHtml($row);
        }
                echo $html."
                </tbody>
                </table>
              </div>
            </div>
          </div>";
        
    }
       
        private  function getHtml($row)
        {
            $id=$row['id'];
            $name=$row['name'];
            $c=$row['cat_id'];
            $img=$row['prev_img'];
            $vd=$row['prev_video'];
            $p=$row['price'];
          return  "
               <tr> <td> $id</td>
                <td> $name</td>
                <td> $c</td>
                <td> $p</td>
                <td><img src='$img' height='60' width='60'></td>
                
                <td>
                <video  height='140' width='200' preload='none' controls>
                <source  src='$vd'></source>
                   </video>
                
                </td>
                <td> <span data-course_edit='$id' class='btn btn-primary text-white edit-course' data-toggle='modal' data-target='.bd-example-modal-lg1' > Edit</span></td>
                <td> <span data-course_del='$id' class='btn btn-danger text-white del-course' > delete</span></td>
                </tr>
             ";
        }
   
    public function getAllVideo(){
        $query = $this->con->prepare("SELECT * FROM videos ORDER BY 1 DESC");
       
        $query->execute();
      
        
        $html=' <div class="card mb-4">
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

              <thead>


                <tr>
                  <th style="font-size:14px;"> id</th>
                  
                  <th style="font-size:14px;">title</th>                             
                  <th style="font-size:14px;">desc</th>
                  <th style="font-size:14px;">filepath</th>
                  <th style="font-size:14px;">notes</th>
                  <th style="font-size:14px;">course id</th>
                  <th style="font-size:14px;">Edit</th>
                  <th style="font-size:14px;">delete</th>
                 
                  
                </tr>
              </thead>

              <tbody>
              
          

              ';

       
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
           $html.=$this->getVHtml($row);
        }
                echo $html."
                </tbody>
                </table>
              </div>
            </div>
          </div>";
        
    } 
       
        private  function getVHtml($row)
        {
            $vid=$row['video_id'];
            $name=$row['title'];
            $dsc= substr($row['description'],0,30);
            $pth=$row['filepath'];
            $nt=$row['notes'];
            $cid=$row['course_id'];
          return  "
               <tr> <td> $vid</td>
                <td> $name</td>
                <td><p> $dsc....</p></td>
                <td> 
                <video  height='140' width='200' preload='none' controls>
                <source  src='$pth'></source>
                   </video>
                </td>
                <td>$nt</td>
                
                <td>
                $cid
                
                </td>
                <td> <span data-video_edit='$vid' class='btn btn-primary text-white btn-sm edit-video' data-toggle='modal' data-target='.bd-example-modal-lg2' > Edit</span></td>
                <td> <span data-video_del='$vid' class='btn btn-danger btn-sm text-white del-video' > delete</span></td>
                </tr>
             ";
        }
   
    

}
?>