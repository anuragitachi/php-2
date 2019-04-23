<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user=$_POST["name"];
$pass=$_POST["pass"];
$sql="SELECT * FROM user where user='$user' and password='$pass'";

if ($result=mysqli_query($conn,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount==1)
  {
	  echo 'Logged in';
	  $_SESSION["user"] = $user;
	  echo "....................Redirecting to home page in 2 seconds";
	  header( "refresh:3;url=home.php" );
  }
  else 
  {
	  echo 'Either username or password is incorrect';
  }
  }

mysqli_close($conn);
?>