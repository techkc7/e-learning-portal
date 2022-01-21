<?php
       include_once("../includes/config/db.php");
       require_once("../check-login.php");
        require_once("../includes/classes/Course.php");
       require_once("../includes/classes/Category.php");

      
        $c=new Course($con);

         $et=$_POST['edt'];

         $cat=new Category($con);
        
          $query = $con->prepare("SELECT * FROM course where id=:id");
          $query->bindValue(":id", $et);
          $query->execute();
          
        
              $html="";
         
          $row = $query->fetch(PDO::FETCH_ASSOC);
              
        
              $id=$row['id'];
              $name=$row['name'];
              $c=$row['cat_id'];
              $img=$row['prev_img'];
              $vd=$row['prev_video'];
              $p=$row['price'];
            echo  " <table class='table table-bordered ' id='dataTable' width='100%' cellspacing='0'>
  
            <tr>

            <th align='right'><b> Course Title</b></th>
            <td>
            <input type='text' name='v_title' placeholder='Title' value='$name' class='form-control' required>
            </td>
        </tr>
      <tr>

            <th align='right'><b> Course Price</b></th>
            <td>
            
            <input type='number' min='1' max='99999' name='v_price' placeholder='Price' value='$p' class='form-control' required>
            </td>
        </tr>

        <tr>
            <td align='right'><b>  Category</b></td>
            <td>
                <select name='v_cat'  class='form-control' required >";

                 echo" <option value='$c'>$c </option>";
                 
                 $cat->get_cat();
                  
              echo"    
              </select>
              </td>						
          </tr>

        <tr>
          <th align='right'><b> Preview Image </b></th>
          <td><input type='file' name='img'   class='form-control' value='$img' placeholder='Image Url' required ></td>
        </tr>
        <tr>
          <th align='right'><b> Preview Video </b></th>
          <td><input type='file' name='vid'   class='form-control' value='$vd' placeholder='Video Url' required ></td>
        </tr>

       

      

<tr align='center'>
<input type='hidden' name='upd_id'  value='$id'  >
  <td colspan='2'><input type='submit' name='upd'  class=' col-sm-4 btn btn-primary text-white' value='update' ></td>
</tr>
</table>
               ";
        
  

       
  


 ?>