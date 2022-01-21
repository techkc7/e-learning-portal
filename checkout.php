<?php

require_once("template/header_content.php");
require_once("check-login.php");

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

		   <div class="row bg-white ">

 
		  	<div class="col-md-10 p-5">


			  <h1 class="mt-4">Checkout</h1>

			  <div class="card mb-4">
			
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
					  <thead>
						<tr class="">
						  <th>id</th>
						  <th>image</th>
						  <th>name</th>
						  <th>price</th>
						 

						</tr>
					  </thead>
					  <tbody>

						<?php
					
						
						$cart = new Cart($con,$_SESSION['userid']);
						$p= $cart->getPrice();
						$itms= $cart->getItems();	
						$user= $cart->getUser();
						 
						   foreach($itms as $pro) {
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
						 
						</tr>
					   ";
				  }
				  echo"
				</tbody>
				</table>
				</div>
				</div>
				</div>
				<div class='col-md-auto text-center pb-5  '>
					 <h4  class=' col-md-4  float-right' > Cart total <b> &#x20B9;$p</b></h4>
				  </div>
				  <div class='col-md-auto text-center pb-5  '>
					 <a href='confirm.php?uid=$user' class='btn bg-info text-white  col-md-4  float-right' >Pay Now</a>
				  </div>
				";
			
			
					   	?>

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