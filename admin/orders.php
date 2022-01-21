<?php
$pg_title="Orders";

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
           
         <div class="odrata">
           
         </div>

            
            
    
        </div>
      </main>
      <?php include_once("template/footer.php");  ?>
    </div>
  </div>
  <?php include_once("template/footer_content.php");  ?>
</body>

</html>