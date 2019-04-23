<?php 
session_start();
$_SESSION['cart'][] = $_POST['bid'];
header( "refresh:0;url=buy.php" );
?>