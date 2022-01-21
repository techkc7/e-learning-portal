<?php
require_once("../includes/config/db.php");
require_once("../includes/classes/SearchResultsProvider.php");
require_once("../includes/classes/EntityProvider.php");
require_once("../includes/classes/Entity.php");
require_once("../includes/classes/PreviewProvider.php");

if(isset($_POST["term"])) {
    
    $srp = new SearchResultsProvider($con);
    echo $srp->getResults($_POST["term"]);

}
else {
    echo "No term or username passed into file";
}
?>