<?php 
session_start();
ob_start();
include_once 'data/class.php';
$adminclass = new AdminClass ;
$user_id = $_SESSION['user_id'];
if (isset($_GET["route"])) $_GET["route"]; else $_GET["route"] ='index';


?>