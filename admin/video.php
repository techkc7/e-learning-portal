<?php
    $pg_title="Add Video";
		require_once("template/header_content.php");
		$course = new Course($con);
	
		
?>

</head>

<body class="sb-nav-fixed">
<?php
require_once("template/header.php");	?>

<div id="layoutSidenav">

<?php
include_once("template/sidebar.php");  ?>
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">

		<h3 class="h3 mb-4 text-gray-800"><?php echo $pg_title; ?> </h3>
    
       


    <div class="container">
    
          <div class="row">
          <div class=" col-lg-9 m-auto p-3  ">

              <div class="row p-2 text-center w-auto">
              <button type="button" class="btn btn-primary btn-lg col-md-7" data-toggle="modal" data-target=".bd-example-modal-lg3">Add Video</button>

            <?php 
            	include_once("template/uploadvid_dg.php");
              include_once("template/editcoursevid_dg.php");
            ?>


            </div>
          </div>
          </div>
            <div>
           
           
          
                 <div class=" loadcourse">
           
           
           
               <?php 
               
                $course->getAllVideo();
             
                ?>
             </div>   
             </div>   


		</div>

	</main>
	<?php include_once("template/footer.php");  ?>
</div>
</div>
<?php include_once("template/footer_content.php");  ?>
</body>

</html>

