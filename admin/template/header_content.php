<?php
include_once("includes/config/db.php");
require_once("check-login.php");
require_once("includes/classes/Category.php");
require_once("includes/classes/User.php");
require_once("includes/classes/Course.php");

require_once("includes/classes/Course.php");
require_once("../includes/classes/OrderContainers.php");
require_once("../includes/classes/Orders.php");
require_once("../includes/classes/Entity.php");
require_once("../includes/classes/OrderProvider.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title> <?php  echo $pg_title;?></title>
<link href="dist/css/styles.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
</script>
</head>