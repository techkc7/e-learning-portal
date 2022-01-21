<?php

require_once("template/header_content.php");
require_once("check-login.php");
require_once("includes/classes/Orders.php");
$pg_title = "Payment confirmation ";
require('config.php');
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";



?>

<body id="page-top" class=" ">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
		include_once("template/sidebar.php");
		?>
    <div id="content-wrapper" class="d-flex flex-column ">
      <div id="content">
        <?php
			   require_once("template/header.php");


				//	include_once("template/slider.php");

			 ?>


        <div class="container-fluid  " style="overflow-y:auto; min-height:500px;">

          <div class="row bg-white mt-5 ">


            <div class="col-md-10 ">



        



              <?php

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
  
  if(isset($_POST['svid'])){
    
  

      
      $sv = $_POST['svid'];
      $_SESSION['single_vid']=$sv;
      $v = new Video($con,$sv);
      $d=$v->getDescription();
      $n=$v->getTitle();
      $thumbnail=$v->getThumbnail();
     
      $vurl=$v->getFilePath();
      
      
    echo"  <div class='card col-md-10 mr-auto ml-auto p-0 mb-4 svpl' >
        
      <img src='$thumbnail' class='Img img-fluid' hidden>

      <video   muted class='previewVideo embed-responsive ' width='100%' height='500' onended='previewEnded()'>
          <source src='$vurl' type='video/mp4'>
      </video>
      
      <div class='previewOverlay text-center '>
          
           <div class='mainDetails'>
            
              
              <div class='buttons'>
              <button onclick='pause_play()'><i class='fas fa-play plbtn'></i>Play </button>
              <button onclick='volumeToggle(this)'><i class='fas fa-volume-mute'></i></button>
              </div>

           </div>
          
      </div>
              
     
  
        <div class='card p-0 pb-3 '>
                 
             
           <div class='text-center  '>
           <h3 class=' card-title'>$n</h3>
             <p  class=' card-text'>$d</p>
         
         
           
          
           </div>
          
       </div>
 
  
</div>
 
  ";
       
      
      $categoryContainers = new CategoryContainers($con);
      echo "<div class='row mt-5 mb-3 text-center'>".$categoryContainers->showCategory(48,"You might also like" )."</div>";
       
        
      
       }
      }
else
{
  echo "something went wrong..";
}


   
  

?>


            </div>

            <div class="col-md-2 bg-gray-100 ">
              <?php

							 	 include_once("template/rightBar.php");

					 ?>

            </div>
          </div>
        </div>
        <!-- fluid container start -->


        <?php
					  include_once("template/footer.php");
					  require_once("template/footer_content.php");

					?>
      </div>
      <!-- content end -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <a class="scroll-to-top rounded align-bottom" href="#page-top">
    <i class="fas fa-angle-up text-white"></i>
  </a>

  <!-- Scroll to Top Button-->


</body>

</html>