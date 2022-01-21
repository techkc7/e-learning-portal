<?php

include_once("template/header_content.php");

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
		         

	   	<div class="container-fluid  " style="overflow-y:auto; min-height:500px;">

		   <div class="row bg-white  ">

 
		  	<div class="col-md-10 p-5">


			  <h1 class="mt-4">Cart summary</h1>

			  <div class="card mb-4">
			
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
					  <thead>
						
					  </thead>
					  <tbody>

						<?php
						
				
						
						if(isset($_SESSION['product'])&&count($_SESSION['product'])>0) {
							echo"<tr>
							<th>id</th>
							<th>image</th>
							<th>name</th>
							<th>price</th>
							<th>action</th>
	
						</tr>";
						   $data = $_SESSION['product'];
						   foreach($data as $pro) {
							$entity = new Entity($con, $pro);
							$thumbnail=$entity->getThumbnail();
							$price=$entity->getPrice();
							$id=$entity->getId();
							$name=$entity->getName();
				   echo"<tr>
						  <td> $id </td>
						  <td><img src='$thumbnail' class='' height='60' ></td>
						  <td> $name </td>
						  <td> $price </td>
						  <td><p class='btn btn-danger delcart' data-id='$id'>Delete</p>   </td>
						</tr>
					   ";
				  }
				
				
				}
				else {
				
				if(isset($_SESSION['userid'])) {
					# code...
		
					$cart = new Cart($con,$_SESSION['userid']);
						$iscart= $cart->isCart();
						$price=$cart->getPrice();
						$itms= count($cart->getItems());
					
						if ($iscart>0) {
			
							
							echo"
							<div class=' text-center  p-3 mt-5 mb-5'>
							<p class='h4 text-dark'>	In your cart <b class=' text-primary'> $itms</b> item and total cart value is  <b class='text-danger'>&#x20B9;$price</b>
							checkout now
							</p>
							
							</div>
							
			<div class='col-md-auto text-center pb-5  '>
			 <a  href='checkout.php' class='btn bg-success text-white  col-md-4   float-right ' >Checkout</a>
			</div>
				";
						}
						else{
							echo" <h3 class='d-block text-center text-danger p-3 mt-5 mb-5'>Your Cart is empty !!</h3>
							 <a href='index.php' class='nav-link p-3 text-center text-lg '>Continue Shopping</a>
							";
							
					
						}
						
						
					}
					else{
				  echo" <h3 class='d-block text-center text-danger p-3 mt-5 mb-5'>Your Cart is empty !!</h3>
					 <a href='index.php' class='nav-link p-3 text-center text-lg '>Continue Shopping</a>
				  ";
					
			
				}
			}   
						 
						 
						 	?>
							 	</tbody>
				</table>
				</div>
				</div>
				</div>
				<?php
				if(isset($_SESSION['product'])&&count($_SESSION['product'])>0) {
				echo"
			
			<div class='col-md-auto text-center pb-5  '>
			 <button class='btn bg-success text-white  col-md-4  float-right ' id='ckout'>Checkout</button>
			</div>
				";
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