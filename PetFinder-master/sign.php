<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$data1=$_POST["name"];
$data2=$_POST["user"];
$data3=$_POST["email"];
$data4=$_POST["pass"];
$data5=$_POST["phone"];
$data6=$_POST["address"];
$sql="SELECT * FROM user where user='$data2'";
if ($result=mysqli_query($conn,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount!=0)
  {
	  echo 'Username already exists';
	  echo "....................Redirecting to sign up page in 3 seconds";
	  header( "refresh:3;url=signup.html" );
  }
else
{
$sql = "INSERT INTO user (name, user, email, password, phone, address)
VALUES ('$data1', '$data2', '$data3','$data4',$data5,'$data6')";

if ($conn->query($sql) === TRUE) {
    echo "Sign up successful..............";
	echo "Redirecting to home page in 3 seconds";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header( "refresh:3;url=index.html" );
}
  }
?>