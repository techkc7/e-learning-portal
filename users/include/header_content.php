<?php

require_once("../includes/config/db.php");
require_once("../check-login.php");

require_once("../includes/classes/PreviewProvider.php");
require_once("../includes/classes/CategoryContainers.php");
require_once("../includes/classes/Entity.php");
require_once("../includes/classes/EntityProvider.php");
require_once("../includes/classes/ErrorMessage.php");
require_once("../includes/classes/CourseProvider.php");
require_once("../includes/classes/Video.php");
require_once("../includes/classes/VideoProvider.php");
require_once("../includes/classes/Constants.php");
require_once("../includes/classes/FormSanitizer.php");
require_once("../includes/classes/User.php");
require_once("../includes/classes/Account.php");
require_once("../includes/classes/Cart.php");
require_once("../includes/classes/Orders.php");
require_once("../includes/classes/OrderProvider.php");

require_once("../includes/classes/OrderContainers.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo $pg_title;?> </title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="include/css/style.css" rel="stylesheet">
  
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    
    </head>