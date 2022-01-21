<?php
$pg_title = "Order History";
require_once("../includes/config/db.php");
require_once("include/header_content.php");

require_once("../check-login.php");
$userid = $_SESSION['userid'];

?>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php require_once("include/sidebar.php"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require_once("include/header.php"); ?>

        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
       <h1 class="mt-4">Order history</h1>


            <?php
                    $od = new OrderContainers($con);

                    echo $od->showUserOrder($userid); 
                  
             ?>

      </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php

      require_once("include/footer.php");

      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php

  require_once("include/footer_content.php");

  ?>

</body>

</html>

