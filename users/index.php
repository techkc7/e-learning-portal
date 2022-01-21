
<?php
$pg_title = "Home";
require_once("include/header_content.php");
require_once('../check-login.php');




$userid = $_SESSION['userid'];
$user = $_SESSION['name'];
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php

    require_once("include/sidebar.php");
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php

        require_once("include/header.php");

        ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid mt-5" style="background:linear-gradient(315deg, #d2d2e2 60%,#f2f2f2 40%);" >

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $pg_title; ?> </h1>
      
          <div class="row" >
      
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Enroll course</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <i class="fas fa-bookmark"></i> <?php 
                               $od=new Orders($con,$userid);
                        echo $od->allEnrollCourse() ?>
                        
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
         

           
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> view Course </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo 6 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

       


          <div class="container d-inline-flex flex-wrap text-center" >
       
          
       <?php
       
       $od=new Orders($con,$userid);
     $rst= $od->viewCourse();
     
      
      foreach ($rst as  $c)
      {
        
       $entity = new Entity($con, $c);
      
       $id = $entity->getId();
       $price = $entity->getPrice();
       $thumbnail = $entity->getThumbnail();
       $name = $entity->getName();

       echo " <div class=' card  col-md-5  p-0 offset-1 my-3 ' style=''>
                  
                     <a href='watch.php?id=$id'>
                     
                           <img src='../$thumbnail' height='200' title='$name' class=' card-img-top p-0'>
                     
                       </a>              
                      
                    
                       
                         <div class=''>
                         <p class='card-title lead p-2  text-info text-uppercase'>
                         $name
                         </p>
                         </div>
                       
                       
                        
                       
                </div>
               
               ";
       
                
      }
       
       ?>
       </div>
<hr>
    
    <?php
    
   
     foreach ($rst as  $c)
     {
       
      $entity = new Entity($con, $c);
     
     
      $cat = $entity->getCategoryId();
    
    $categoryContainers = new CategoryContainers($con);
    echo "<div class='row mt-5 mb-3 text-center'>".$categoryContainers->showCategoryuser($cat,"You might also like" )."</div>";


     }
    ?>
	



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php

require_once("include/footer.php");

?>
  
  <?php

  require_once("include/footer_content.php");

  ?>

</body>

</html>