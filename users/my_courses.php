
<?php
$pg_title = "My Courses";
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
        <div class="container-fluid mt-5  ">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800  ml-5 "><?php echo $pg_title; ?> </h1>      

     <div class="container d-inline-flex flex-wrap text-center">
       
          
          <?php
          
          $od=new Orders($con,$userid);
         $rst= $od->viewCourse();
         if(count($rst)==0){
        echo"  <div class=' container mt-5 text-lg text-center p-5 alert-primary' >
                          
        You have not Enroll in any course
        
        
          </div>
          ";
         
         }
         else{
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
                         
                          <div class='card-body text-center' style='background:linear-gradient(135deg, #f02fc2 0%,#6094ea 100%);'>
                          
                            <p class=' lead text-white'>$name</p>
                          
                          
                            </div>
                          
                   </div>
                  
                  ";
          
                   
         }
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