<?php 
session_start();
foreach (array_keys($_SESSION["cart"], $_POST["bid"]) as $key) {
    unset($_SESSION["cart"][$key]);
}
header( "refresh:0;url=viewcart.php" );
?>