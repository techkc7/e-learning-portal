<?php

require_once("template/header_content.php");
require_once("check-login.php");
require_once("config.php");
 $pg_title=" Single Video Payment ";

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
						
            if(isset($_GET['sv'])){
    
              $svid=$_GET['sv'];
              $p=$_GET['p'];
             			if ($_SESSION['single_vid']==$svid) {
                     
                    $v = new Video($con,$svid);
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
    
			
else{


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
             
            
?>



   <h1 class="h3 mb-4 text-gray-800"><?php echo $pg_title; ?> </h1>
          <div class="row">
            
          <div class="col-xl-12">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">

       <form action="payment_success1.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $keyId?>"
    data-amount="<?php echo $amount?>"
    data-currency="INR"
    data-name="Logixfirm"
    data-image="http://logixfirm.com/logo.png"
    data-description="Payment "
    data-prefill.name=""
    data-prefill.email=""
   
   
    data-order_id="<?php echo $razorpayOrderId?>"
    
  >
  </script>
   <input type="hidden" name="svid" value="<?php echo $svid?>">
 
  
   <input type="hidden" name="amount" value="<?php echo $amount?>">

</form>


				  </div> 
          
          </div>
          </div>
          </div>
          <?php }} ?>
         
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