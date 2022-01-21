<?php
$pg_title = "Update Profile";
require_once("../includes/config/db.php");
require_once("include/header_content.php");

require_once("../check-login.php");
$userid = $_SESSION['userid'];

$detailsMessage = "";
$passwordMessage = "";
$subscriptionMessage = "";

if(isset($_POST['update'])){

  $account = new Account($con);

    $mob =$_POST["mobile"];
    $name =$_POST["name"];
    $email =$_POST["email"];

    $scl =$_POST["scl"];
    $course =$_POST["course"];


    if($account->updateDetails($name,$mob,$email,$userid,$course,$scl)) {
        $detailsMessage = "<div class='alert-success'>
                                Details updated successfully!
                            </div>";
    }
    else {
        $errorMessage = $account->getFirstError();

        $detailsMessage = "<div class='alert-danger'>
                                $errorMessage
                            </div>";
    }


}

if(isset($_POST["changePass"])) {
  $account = new Account($con);

  $oldPassword = FormSanitizer::sanitizeFormPassword($_POST["oldPassword"]); 
  $newPassword = FormSanitizer::sanitizeFormPassword($_POST["newPassword"]);
  $newPassword2 = FormSanitizer::sanitizeFormPassword($_POST["newPassword2"]);

  if($account->updatePassword($oldPassword, $newPassword, $newPassword2, $userid)) {
      $passwordMessage = "<div class='alert-success'>
                              Password updated successfully!
                          </div>";
  }
  else {
      $errorMessage = $account->getFirstError();

      $passwordMessage = "<div class='alert-danger'>
                              $errorMessage
                          </div>";
  }
}


?>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php require_once("include/sidebar.php"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require_once("include/header.php"); ?>

        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
           <div class="container">
             
          
          <div class="col-8 mr-auto p-3 ml-auto mt-2 mb-4">
          <h1 class="h3 mb-4 text-gray-800"><?php echo $pg_title; ?> </h1>
        <?php

       $user = new User($con, $userid);

        $name=$user->getName();
        $email=$user->getEmail();
        $username=$user->getUsername();




        ?>

   <form action="" method="post">

  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="colFormLabel" name="name" value="<?php echo $name;?>" >
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="colFormLabel" name="username" value="<?php echo $username;?>" disabled >
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Email </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="colFormLabel" name="email" value="<?php echo $email;?>" required >
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Mobile No.</label>
    <div class="col-sm-10">
      <input type="number" class="form-control " id="colFormLabel" placeholder="Mobile no." name="mobile" required >
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Course Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="colFormLabel" name="course" placeholder="e.g mca, bca..." value="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Institute</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="colFormLabel" name="scl" placeholder="" value="" required >
    </div>
  </div>
  <div class="form-group row">

    <div class=" offset-sm-2 col-sm-4">
      <input type="submit" class="form-control  bg-primary text-white"  name="update"  value="Update" >
    </div>
  </div>
       	<div class="message col-form-label">
                <?php echo $detailsMessage; ?>
            </div>
            

 </form>




<form method="POST">

    <h2>Update password</h2>

    <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Old Password</label>
    <div class="col-sm-10">
    <input type="password" class="form-control" name="oldPassword" placeholder="Old password">
    </div>
  </div>
    <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">New Password</label>
    <div class="col-sm-10">
    <input type="password" class="form-control" name="newPassword" placeholder="Old password">
    </div>
  </div>
    <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Confirm New Password</label>
    <div class="col-sm-10">
    <input type="password" class="form-control" name="newPassword2" placeholder="Old password">
    </div>
  </div>
  
 
    

    <div class="message ">
        <?php echo $passwordMessage; ?>
    </div>

    <div class="form-group row">

<div class=" offset-sm-2 col-sm-4">
  <input  type="submit" name="changePass" class="form-control  bg-primary text-white"  value="Update" >
</div>
</div>
   


</form>




          </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php

      require_once("include/footer.php");

      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php

  require_once("include/footer_content.php");

  ?>

</body>

</html>

