
<nav class="navbar navbar-expand-lg  navbar-dark navbar-collapse fixed-top position-fixed  top_bar border-bottom-warning "
style="background:linear-gradient( #11f ,#111);"
>

    <button class="btn d-flex text-white text-lg align-items-center justify-content-center mr-2 border-0  "  onclick="openCloseNav()">
    <span class="navbar-toggler-icon   " ></span>
    </button>
  <a class="navbar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="navbar-brand-icon">
   <img src="img/logo.png" alt="" height="50" width="50" style="border-radius: 100%;;">
  </div>
  
</a>

  <a class="navbar-brand text-uppercase lead " href="index.php"> Study Mitra</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse  " id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto ml-5  navtop">
      <?php
     // getCats();
      ?>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 searchInput" type="text"  placeholder="Search" aria-label="Search">
     
    </form>
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a href="cart.php" class='btn  '>
        <i class="fas fa-cart-plus text-warning">
      <!-- Counter - Alerts -->
      <span class="badge badge-warning  badge-counter cartcount"><?php 
       if (isset($_SESSION['product'])) {
        echo count($_SESSION['product']);
       }else{
        echo 0;
       }
      
      
      
       ?>
      
      
      </span>       
        
           
        </i>
      </a>

      </li>
      <li class="nav-item">
                           <?php
                            if (isset($_SESSION['email'])) {
                           echo" 
                             
                             <a href='users/index.php' class='nav-link '><i class='fas fa-1x fa-user text-white-50'></i> </a>

                           ";}
                           ?>

      </li>
      
      <li class="nav-item"> <?php
                            if (!isset($_SESSION['email'])) {
                              echo " <a href='login.php' class='nav-link text-gray-100'>Login</a> ";
                             
                              
                            } else {
                              echo " <a href='logout.php' class='nav-link text-gray-100'>Logout</a> ";
                             

                            }

                            ?>


      </li>


    </ul>


  </div>
  
</nav>
<div class="msg position-fixed  bg-success text-white" style="top:100px;right:50px;z-index: 3;  ">

</div>
<div class="conatainer srch " style="margin-top:100px;  ">
</div>
