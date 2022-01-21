<?php
ob_start(); // Turns on output buffering
session_start();

date_default_timezone_set("Asia/Kolkata");
// error_reporting(0);
// ini_set('display_errors', 0);

try {
    $con = new PDO("mysql:dbname=logixfirm;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
}
catch (PDOException $e) {
    exit("Connection failed: ");
}
?>