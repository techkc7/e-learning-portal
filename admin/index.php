<?php
include_once("includes/config/db.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title> Logixfirm</title>
<link href="dist/css/styles.css" rel="stylesheet" />
<script src="dist/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
</script>
</head>
 

<body class="bg-dark">
<div id="layoutAuthentication">
<div id="layoutAuthentication_content">
<main>
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header bg-primary">
               
                <h3 class="  text-center font-weight-light text-white my-2 ">Admin Login</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4" id="inputEmailAddress" type="email"
                        name="email"
                        placeholder="Enter email address" required />
                    </div>
                    <div class="form-group">
                    <label class="small mb-1" for="inputPassword">Password</label>
                    <input class="form-control  py-4" id="inputPassword" type="password"
                    name="pass"
                    placeholder="Enter password" required />
                    </div>
                    
                    <div
                    class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="" href="#">Forgot Password?</a>
                    <button type="submit" class="btn btn-primary " name="admin_login"> AdminLogin</a>
                    </div>
                </form>
               
            </div>
            
        </div>
    </div>
</div>
</div>
</main>
</div>
<div id="layoutAuthentication_footer">
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid">
<div class="d-flex align-items-center justify-content-between small">
    <div class="text-muted">Copyright &copy;Logixfirm 2020</div>
    <div>
        <a href="#">Privacy Policy</a>
        &middot;
        <a href="#">Terms &amp; Conditions</a>
    </div>
</div>
</div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="dist/js/scripts.js"></script>
</body>

</html>

<?php



if(isset($_POST['admin_login'])){
$password =$_POST['pass'];
$un =$_POST['email'];
$pw=md5($password);

$query = $con->prepare("SELECT * FROM admin WHERE email=:un AND pass=:pw");
$query->bindValue(":un", $un);
$query->bindValue(":pw", $pw);

$query->execute();

if($query->rowCount() == 1) {

     $_SESSION['userid_admin'] = $un;
    $_SESSION['login_type'] = "admin";
    $_SESSION['admin_session_id']=session_id();

echo '<script>alert("Login Success.");window.location.assign("home.php")</script>';
}
else{
echo '<script>alert("Invalid Userid or Password")</script>';
}
}

?>
