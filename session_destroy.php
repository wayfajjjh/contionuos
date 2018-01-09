<?php
ob_start();
session_start();

if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>

<?php
session_destroy();

if(isset($_SESSION['username'])){
	header('location:login.php');
}

?>