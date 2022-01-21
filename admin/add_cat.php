<?php
$pg_title="Add Category";

require_once("template/header_content.php");	


?>

<body class="sb-nav-fixed">
<?php
require_once("template/header.php");	?>

<div id="layoutSidenav">

<?php
include_once("template/sidebar.php");  ?>
<div id="layoutSidenav_content">
	<main>


	<div class="container-fluid">


		<div class="container">

			
			<div class=" m-5   card ">
			<h4 class="bg-primary text-white card-header mb-3">Add Category</h4>
				<form action="" method="POST" class=" p-2 col-lg-8 m-auto" id="f1">

					<div class="form-group  ">

						<input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required>
					</div>

					<button type="submit" id="add" class="btn btn-primary float-right " name="category">Add Category</button>
				</form>
			</div>
			
		

    	<div class="results  pb-5 scrolled">
								 <?php
								 $cats = new Category($con);
    
								 echo $cats->view_cat();
								 ?>
     </div>
		

		</div>
	</main>
	<?php include_once("template/footer.php");  ?>
</div>
</div>
<?php include_once("template/footer_content.php");  ?>
</body>
</html>

<script>

$("#f1").on('submit', function() {




		   event.preventDefault();
				var val = $("#title").val();
				
				if(val != "") {
						$.post("ajax/add_cat.php", { title: val }, function(data) {
							$(".results").html(data);
						 $('#f1').trigger('reset');
							
						})
				}
				else {
						$(".results").html("");
				}

	
});



</script>