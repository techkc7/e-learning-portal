<?php
   include_once("../includes/config/db.php");
   require_once("../check-login.php");
    require_once("../includes/classes/Course.php");
		$course = new Course($con);


 
    
    $v_title=$_POST['v_title'];
    $file=$_POST['vid'];
    $vn=$_POST['vid_notes'];
    $desc=$_POST['desc'];
    $v_cat=$_POST['v_cat'];
    $target="courses/videos/".$file;
    $vnt="courses/videos/notes/".$vn;
    echo $course->addVideo($v_title,$desc,$target,$vnt,$v_cat);
	
		
?>

