<?php

if(isset($_SESSION['admin_session_id']) && $_SESSION['login_type']=='admin'){
}
else{
	echo '<script>;window.location.assign("index.php");</script>';
	exit();
}
?>