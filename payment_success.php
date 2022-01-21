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


        <div class="container-fluid  " style="overflow-y:auto; min-height:500px; padding-top: 60px;;">

          <div class="row bg-white mt-5 ">


            <div class="col-md-10 p-5">



        



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
  
  if(isset($_POST['uid'])){
    
  
      $uid=$_POST['uid'];
      
        $email=$_POST['email']; 
        $name=$_POST['name']; 
        
        $amount=$_POST['amount']/100; 
      $payment=$_POST['razorpay_payment_id']; 
     
      $hash=$_POST['razorpay_signature']; 
      
      $ordered=$_POST['razorpay_order_id'];
      
      $ordr=new Orders($con,$uid);
      
      $run_pay=$ordr->insertPayment($payment,$ordered,$hash,$amount);
       
     
       if($run_pay){
      
        $status="accepted";
        $discount=0;
      $cart = new Cart($con,$uid);
      $p= $cart->getPrice();
      $itms= $cart->getItems();	
      $count= count($cart->getItems());
      $d="";
      foreach($itms as $pro) {
        $entity = new Entity($con, $pro);
       
        $iprice=$entity->getPrice();
        $id=$entity->getId();
        $pname=$entity->getName();
        
        $rst=$ordr->insertOrder($iprice,$id,$status);
        $d.="<strong> Course Id :$id   course name: $pname  price: <strong>&#x20B9;$iprice</strong> </strong> ";
        
      }
        if($rst){
          $cart->deleteCart();
        }
        
      
          $subject="Order Confirmation";
          $to=$email;
          $msg="
            <html>
            Dear, <strong>$name</strong> Your order has successfully placed on
  
            <b> <a href='http://logixfirm.com'> logixfirm</a> </b></br>
            
            <strong> Your Oders Details.</strong>
            <p>$d</p>
           
             
            Cart Total :   <strong>$p</strong>
           Quantity:  <strong>$count</strong>
           Discount:   <strong>$discount</strong>
            Net amount paid: <h2>$amount</h2>.
            
  
            </html>
                             
      ";
      $header="MIME-Version:1.0"."\r\n";
      $header.="Content-type:text/html;charset=UTF-8"."\r\n";
      $header.='From:<kchauhan515@gmail.com>'."\r\n";
      mail($to,$subject,$msg,$header);
  
  
          
        
        echo '<script>window.location.assign("users/index.php");</script>';

       }
        
 
      


  

        
       
          
       }
      }
else
{
    //  echo "<script>window.location.assign('payment_cancel.php?pu=$user_id');</script>";
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