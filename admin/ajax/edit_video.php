<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
        require_once("../includes/classes/Course.php");
       require_once("../includes/classes/Category.php");

      
        $c=new Course($con);

         $ets=$_POST['edt_vid'];

        
          $query = $con->prepare("SELECT * FROM videos where video_id=:id");
          $query->bindValue(":id", $ets);
          $query->execute();
          
        
              $html="";
         
          $row = $query->fetch(PDO::FETCH_ASSOC);
              
        
          $vid=$row['video_id'];
          $name=$row['title'];
          $dsc= $row['description'];
          $pth=$row['filepath'];
          $nt=$row['notes'];
          $cid=$row['course_id'];
          
            echo  " <table class='table table-bordered ' id='dataTable' width='100%' cellspacing='0'>
  
            <tr>

            <th align='right'><b> Course Title</b></th>
            <td>
            <input type='text' name='v_title' placeholder='Title' value='$name' class='form-control' required>
            </td>
        </tr>
      <tr>

            <th align='right'><b> Description</b></th>
            <td>
            
            <textarea type='text'  name='desc' placeholder='Title' value='$dsc' class='form-control' rows='7' required>$dsc</textarea>
            </td>
        </tr>

        <tr>
            <th align='right'><b>  Category </b></th>
            <td>
                <select name='v_cat'  class='form-control' required >

                 <option value='$cid'>$cid </option>";
                 
                     $c->get_course_id();
                  
                 echo"
              </select>
              </td>						
          </tr>

        <tr>
          <th align='right'><b> Video Url </b></th>
          <td><input type='text' name='vid'   class='form-control' value='$pth' placeholder='Video Url' required ></td>
        </tr>
        <tr>
          <th align='right'><b>  Video Notes </b></th>
          <td><input type='text' name='vid_notes'   class='form-control' value='$nt' placeholder='Video Url' required ></td>
        </tr>

       

      

<tr align='center'>
<input type='hidden' name='upd_vid'  value='$vid'  >
  <td colspan='2'><input type='submit' name='updvid'  class=' col-sm-4 btn btn-primary text-white' value='update' ></td>
</tr>
</table>
               ";
        
  

       
  


 ?>