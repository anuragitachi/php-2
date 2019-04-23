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
$data1=$_POST["name"];
$data2=$_POST["author"];
$data3=$_POST["edition"];
$data4=$_POST["pub"];
$data5=$_POST["price"];
$data6=$_SESSION["user"];
$imagetmp=addslashes (file_get_contents($_FILES['photo']['tmp_name']));
$sql = "INSERT INTO book (name, author, edition, pub, price, photo, user)
VALUES ('$data1', '$data2', '$data3','$data4',$data5,'$imagetmp','$data6')";

if ($conn->query($sql) === TRUE) {
    echo "Book uploaded...................";
	echo "Redirecting to home page in 2 seconds";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header( "refresh:2;url=home.php" );
}
?>