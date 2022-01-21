<?php

if (isset($_SESSION['user_session_id']) && $_SESSION['login_type'] == 'user') {
} else {
	echo '<script>alert("PLease login again....");window.location.assign("login.php");</script>';
	exit();
}
