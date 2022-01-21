
<?php

include_once("template/header_content.php");

?>

<body id="page-top" class=" ">

<!-- Page Wrapper -->
<div id="wrapper">

<?php
		include_once("template/sidebar.php");
	

		?>
<div id="content-wrapper" class="d-flex flex-column ">


	<div id="content ">
	

	   	  <?php

		     require_once("template/header.php");
	
		   ?>	
	
	   	 <?php

					include_once("template/slider.php");			

			 ?>
				<!-- fluid container start -->
			
	  <div class="container-fluid   " style="overflow-y:auto; min-height:500px; background: #f5f5f5;">

						
				  <div class=" card-body ">
					
				
				
				
									
			   	<?php
				     	$containers = new CategoryContainers($con);
						//	 echo $containers->showCategory(48,"New Courses","d-flex");	
							 ?>
							
						
					
					<?php
					
					echo $containers->showAllCategories();
					?>
						
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