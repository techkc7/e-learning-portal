<?php
require_once("../includes/config/db.php");

require_once("../includes/classes/EntityProvider.php");
require_once("../includes/classes/Entity.php");
require_once("../includes/classes/Video.php");
if(isset($_POST["vid"])) {
    $v=$_POST["vid"];
    $video = new Video($con,$v);
    $video->incrementViews();

   
}

?>