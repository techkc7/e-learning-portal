<?php
$pg_title="Home Page";

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

          <h3 class="h3 mb-4 text-gray-800"><?php echo $pg_title; ?> </h3>

          <hr>
          <div class="row">

          <?php
                    $od = new Orders($con,$_SESSION['userid_admin']);
                   

                   
                  
             ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings Logixfirm (Monthly)
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <i class="fas fa-rupee-sign"></i> <?php $od->income_mthly()  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sell Courses</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <i class="fas fa-rupee-sign"></i>
                        <?php $od->sell() ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Total Users
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <i class="fas fa-rupee-sign"></i>
                        <?php $od->userCount() ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>




            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total earning </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i>
                      <?php $od->income()  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class=" col-lg-9 m-auto p-3  ">

            <div class="row p-2 text-center w-auto">

            
            <button type="button" class="btn btn-success  col-md-5 mr-2" data-toggle="modal" data-target=".bd-example-modal-lg3">Upload Video</button>
              <button type="button" class="btn btn-primary  col-md-5 mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">Upload Course</button>

              <?php 
            	include_once("template/upload_dg.php");
              include_once("template/editcourse_dg.php");
              include_once("template/editcoursevid_dg.php");
              include_once("template/uploadvid_dg.php");
            ?>
         
		   </div>
		   
            <div class="row p-2 text-center w-auto">

		
            <h2 class="btn btn-danger col-md-5 mr-2 ord"> View Orders</h2>
              <h2 class="btn btn-success col-5 mr-2 vusr"> View users </h2>
         
           </div>
            <div class="row p-2 text-center w-auto">

		
            <h2 class="btn btn-primary col-md-5 mr-2 vd"> View Videos</h2>
            <h2 class="btn btn-info col-md-5 mr-2 vcd"> View Course</h2>
             
             
         
           </div>

          </div>
                
             <div class="container loadcourse">
               <?php 
                $cr = new Course($con);
               echo $cr->getAllCourse();
             
                ?>
             </div>   
        </div>
      </main>
      <?php include_once("template/footer.php");  ?>
    </div>
  </div>
  <?php include_once("template/footer_content.php");  ?>
  <script>
    
 $(".vusr").on('click', () => 
      {

$.ajax({
  url: "ajax/viewUsers.php",
  type: "POST",
  cache: false,
  success: function(dataResult){
    $('.loadcourse').html(dataResult); 
  }
});
});
 $(".vcd").on('click', () => 
      {

$.ajax({
  url: "ajax/viewCourse.php",
  type: "POST",
  cache: false,
  success: function(dataResult){
    $('.loadcourse').html(dataResult); 
  }
});
});
 
 $(".ord").on('click', () => 
      {

$.ajax({
  url: "ajax/viewOrders.php",
  type: "POST",
  cache: false,
  success: function(dataResult){
    $('.loadcourse').html(dataResult); 
  }
});
});
 $(".vd").on('click', () => 
      {

$.ajax({
  url: "ajax/viewVideo.php",
  type: "POST",
  cache: false,
  success: function(dataResult){
    $('.loadcourse').html(dataResult); 
  }
});
});
  
  </script>
</body>

</html>
