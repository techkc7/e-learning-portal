<?php
    include_once("../includes/config/db.php");
    require_once("../check-login.php");
     require_once("../includes/classes/Course.php");
    
	
		$course = new Course($con);
	

 
    
        $prev=$_FILES['vid']['tmp_name'];
       
       $img=$_FILES['img']['tmp_name'];
          
        $v_title=$_POST['v_title']; 
        $v_price=$_POST['v_price']; 
        $v_cat=$_POST['v_cat']; 
        $id=$_POST['upd_id']; 
        
  
        $targetdirpre="courses/previews/";
       
        $targetdirimg="courses/img/";
        
       
        $imp=$_FILES['vid']['name'];
        $im=$_FILES['img']['name'];
        $targetfileprev=$targetdirpre.$imp;
       
        $targetfilepimg=$targetdirimg.$im;
  
        move_uploaded_file($prev,"../$targetfileprev");
       
        move_uploaded_file($img,"../$targetfilepimg");
        

				$success= $course->upd_course($v_title,$v_cat,$targetfilepimg,$targetfileprev,$v_price,$id);
			if ($success) {
        echo 1;
      }

       
  
	
		
?>

