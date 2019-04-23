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
$user=$_SESSION["user"];
$bid=$_POST["bid"];
$price=$_POST["price"];
$sql="select credit from user where user='$user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ;
if($row["credit"]<$price)
{
	echo 'You do not have enought credits......................';
	echo 'Redirecting to add credits page in 2 seconds';
	header( "refresh:2;url=addcredits.php" );
}
else
{
	$sql = " update user set credit=credit-'$price' where user='$user'";
	if ($conn->query($sql) === TRUE) {
	$sql="update book set bought='YES',boughtby='$user' where bid='$bid'";
	if ($conn->query($sql) === TRUE) {
	echo ' Book bought';
	}
	else
	{
		echo 'Error happened please try again';
	}
	}
	else
	{
		echo 'Error happened please try again';
	}
header( "refresh:2;url=home.php" );
}
}
?>