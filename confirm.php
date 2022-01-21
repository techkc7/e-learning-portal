<?php

require_once("template/header_content.php");
require_once("check-login.php");
require_once("config.php");
 $pg_title="Payment Confirmation";

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

?>

<body id="page-top" class="bg-white ">

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
		         

	   	<div class="container-fluid  " style="overflow-y:auto; min-height:500px; ">

		   <div class="row ">

 
		  	<div class="col-md-10 p-5">


			
						<?php
						
            if(isset($_GET['uid'])){
    
              $uid=$_GET['uid'];
              $user=new User($con,$uid);
              $name= $user->getName();
              $email= $user->getEmail();	
              $uid= $user->getUserId();	
              
           
         
       
				
						 
          
			
						$cart = new Cart($con,$uid);
						$p= $cart->getPrice();
						



                $api = new Api($keyId, $keySecret);



                $orderData = [
                    'receipt'         => rand(10000,99999)."lgx",
                    'amount'          => 	$p * 100, // 2000 rupees in paise
                    'currency'        => 'INR',
                    'payment_capture' => 1 // auto capture
                ];

                $razorpayOrder = $api->order->create($orderData);

                $razorpayOrderId = $razorpayOrder['id'];

                $_SESSION['razorpay_order_id'] = $razorpayOrderId;

                $displayAmount = $amount = $orderData['amount'];
              }

?>



   <h1 class="h3 mb-4 text-gray-800"><?php echo $pg_title; ?> </h1>
          <div class="row">
            
          <div class="col-xl-12">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">

       <form action="payment_success.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $keyId?>"
    data-amount="<?php echo $amount?>"
    data-currency="INR"
    data-name="Logixfirm"
    data-image="http://logixfirm.com/logo.png"
    data-description="Payment "
    data-prefill.name="<?php echo $name?>"
    data-prefill.email="<?php echo $email?>"
   
   
    data-order_id="<?php echo $razorpayOrderId?>"
    
  >
  </script>
   <input type="hidden" name="uid" value="<?php echo $uid?>">
   <input type="hidden" name="name" value="<?php echo $name?>">
   <input type="hidden" name="email" value="<?php echo $email?>">
  
   <input type="hidden" name="amount" value="<?php echo $amount?>">

</form>


				  </div> 
          
          </div>
          </div>
          </div>
          </div>
				  <div class="col-md-2  ">
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