
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
				
				  <div class="row   ">
			
						
					<div class="col-md-10">
					
				   	
					<div class="card">
						<div class="card-body">
							
					   
					 <?php
					

					if(!isset($_GET["id"])) {
							ErrorMessage::show("No ID passed into page");
					}
					$entityId = $_GET["id"];
					$entity = new Entity($con, $entityId);
					$cat=$entity->getCategoryId();
					
					$preview = new PreviewProvider($con);
					
					echo " <h3 class='d-block  text-center  '>Course Preview</h3> <hr>".$preview->createPreviewVideo($entity);
					
					    $CorsProvider = new CourseProvider();
            echo $CorsProvider->create($entity);
					
					$categoryContainers = new CategoryContainers($con);
					echo "<div class='row mt-5 mb-3 text-center'>".$categoryContainers->showCategory($cat,"You might also like" )."</div>";

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