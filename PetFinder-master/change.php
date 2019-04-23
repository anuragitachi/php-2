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
$data1=$_POST["current"];
$data2=$_POST["new"];
$user=$_SESSION["user"];
$sql="select password from user where user='$user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ;
if($row["password"]==$data1)
{
	$sql = " update user set password='$data2' where user='$user'";
if ($conn->query($sql) === TRUE) {
    echo "Password changed.................";
	echo "Redirecting to home page in 3 seconds";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
else
{
	echo 'Current password is incorrect';
}
header( "refresh:3;url=home.php" );
}
?>