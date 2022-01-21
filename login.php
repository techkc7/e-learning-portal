<?php
require_once("includes/config/db.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);

if(isset($_POST['login']))
{
         $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);      
         $pass = FormSanitizer::sanitizeFormPassword($_POST["password"]);
         $success = $account->login($email,$pass);

  if($success) {    

      header("Location: users/index.php");
    }
   



}

?>
<!DOCTYPE html>
<html lang="en">

<?php

include_once("template/header_content.php");

?>

<body id="page-top" class="bg-white ">

	<!-- Page Wrapper -->
	<div id="wrapper">
		
      <?php
      
      //   include_once("template/sidebar.php");
        
        ?>
        
	  <div id="content-wrapper" class="d-flex flex-column">

			<div id="content">
				
        <?php
        
				require_once("template/header.php");		
	
				?>		
			
				
				<?php
			//	include_once("template/slider.php");
			

				?>
					
					
				<!-- fluid container start -->
        <div class="container-fluid" style="overflow-y:auto; min-height:500px;  ">
       

      <div class=" col-lg-6 col-md-7 col-sm-12   m-auto">

        <div class="card o-hidden border-0 shadow-lg my-2" >
          <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="header text-center">
                        <img src="img/logo.png" title="Logo" alt="Site logo" />
                        <h3>Sign In</h3>
                    <span>to continue to Logixfirm</span>
                       
                    </div>

              <div class="col-x ">
                <div class="p-2">
                 
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                      <input type="text" class="form-control " name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control " name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      LOGIN
                    </button>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="" href="register.php">Create an Account!</a>
                  </div>
                  
                </div>
              </div>
           
          </div>
        </div>

      </div>

    </div>

				    
				  
				
				


					
				</div>
				<!-- fluid container start -->



				<!-- content end -->




			</div>

			<!-- End of Content Wrapper -->
		</div>

		<!-- End of Page Wrapper -->
	</div>
	
	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

	<!-- Scroll to Top Button-->

	<?php
	include_once("template/footer.php");
	require_once("template/footer_content.php");

	?>

</body>

</html>