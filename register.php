 <?php
        require_once("includes/config/db.php");
        require_once("includes/classes/FormSanitizer.php");
        require_once("includes/classes/Constants.php");
        require_once("includes/classes/Account.php");

        $account = new Account($con);

        if(isset($_POST["submitButton"])) {

        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
       
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);

        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $success = $account->register($firstName, $username, $email, $password, $password2);

        if($success) {
          echo"<script>alert('Sign up successfuly!');window.location.assign('login.php');</script>"; 
        
        }
   }

  function getInputValue($name) {
     if(isset($_POST[$name])) {
     echo $_POST[$name];
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

            // include_once("template/sidebar.php");

      ?>

<div id="content-wrapper" class="">
    <div id="content">

         <?php
            require_once("template/header.php");	         
                   
             ?>
                
        


             <div class="signInContainer">

                 <div class="column">

                    <div class="header text-center">
                        <img src="img/logo.png" title="Logo" alt="Site logo" />
                        <h3>Sign Up</h3>
                        <span>to continue to Logixfirm</span>
                    </div>

                    <form method="POST">

                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <input type="text" name="firstName" placeholder="First name"
                            value="<?php getInputValue("firstName"); ?>" required>



                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <input type="text" name="username" placeholder="Username"
                            value="<?php getInputValue("username"); ?>" required>

                        <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <input type="email" name="email" placeholder="Email"
                            value="<?php getInputValue("email"); ?>" required>


                        <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
                        <?php echo $account->getError(Constants::$passwordLength); ?>
                        <input type="password" name="password" placeholder="Password" required>

                        <input type="password" name="password2" placeholder="Confirm password" required>

                        <input type="submit" name="submitButton" value="Sign Up">

                    </form>

                    <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>

                </div>

                </div>


               
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