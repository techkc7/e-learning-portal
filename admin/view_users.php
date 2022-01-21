<?php
$pg_title="View Users";

require_once("template/header_content.php");	

    

?>


<body class="sb-nav-fixed">
  <?php
  require_once("template/header.php");  ?>

  <div id="layoutSidenav">

    <?php
    include_once("template/sidebar.php");  ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h3 class="mt-4"><?php echo $pg_title ?></h3>

           <div class="userdata">
               
           </div>

          </div>
      

      </main>
      <?php include_once("template/footer.php");  ?>
    </div>
  </div>
  <?php include_once("template/footer_content.php");  ?>
</body>

</html>
