
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
	
		   ?>	
	
	   

	  <div class="container-fluid  " style="overflow-y:auto; min-height:500px; ">
				
				  <div class="row ">
			
						
					<div class="col-md-10 mb-3 ">
					
					<div class="card">
						<div class="card-body">
							
					
					<?php
					

					if(!isset($_GET["id"])) {
							ErrorMessage::show("No id passed to page");
					}
					
				
				 
					$containers = new CategoryContainers($con);
					
					echo $containers->showCategory($_GET["id"],"All Courses");
					

	         ?>
					 
					 
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