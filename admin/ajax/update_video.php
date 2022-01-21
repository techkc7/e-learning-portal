<?php
    include_once("../includes/config/db.php");
    require_once("../check-login.php");
     require_once("../includes/classes/Course.php");
    
	
		$course = new Course($con);
	

 
    
    $id=$_POST['upd_vid']; 
    $v_title=$_POST['v_title'];
    $file=$_POST['vid'];
    $vn=$_POST['vid_notes'];
    $desc=$_POST['desc'];
    $v_cat=$_POST['v_cat'];
    $target=$file;
    $vnt=$vn;
    $success= $course->updVideo($v_title,$desc,$target,$vnt,$v_cat,$id);
        

			
			if ($success) {
        echo 1;
      }

       
  
	
		
?>

