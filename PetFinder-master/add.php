<?php
session_start();
if( !isset($_SESSION["user"]) ){
	echo 'Login first';
}
else
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$data1=$_POST["credits"];
$data6=$_SESSION["user"];
$sql = " update user set credit=credit+'$data1' where user='$data6'";

if ($conn->query($sql) === TRUE) {
    echo "Credits added.................";
	echo "Redirecting to home page in 2 seconds";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header( "refresh:2;url=home.php" );
}
?>