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
$amount=0;
foreach($_SESSION["cart"] as $bid)
{
$sql="select price from book where bid='$bid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
$amount=$amount+$row['price'];	
}
}
$sql="select credit from user where user='$user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ;
if($row["credit"]<$amount)
{
	echo 'You do not have enought credits......................';
	echo 'Redirecting to add credits page in 2 seconds';
	header( "refresh:2;url=addcredits.php" );
}
else
{
	$sql = " update user set credit=credit-'$amount' where user='$user'";
	if ($conn->query($sql) === TRUE) {
		
		
	foreach($_SESSION["cart"] as $bid)
	{	
	$sql="update book set bought='YES',boughtby='$user' where bid='$bid'";
	if ($conn->query($sql) === TRUE) {
	echo ' Book bought....';
	}
	else
	{
		echo 'Error happened please try again';
	}}
	unset($_SESSION['cart']);
	}
	else
	{
		echo 'Error happened please try again';
	}
header( "refresh:2;url=home.php" );
}
}
?>