<?php
session_start();
if( !isset($_SESSION["user"]) ){
	echo 'Login first';
}
else
{
echo'
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Bookstore</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
<style>
#output_image
{
 max-width:100px;
}
</style>
</head>




<body>
<div class="main">
<div class="page">
<div class="page-in">
<div class="header">
<div class="topmenu">
<ul>
  <li>
<a href="home.php">Home</a></li>
  <li><a href="sell.php">Sell book</a></li>
  <li><a href="buy.php">Buy book</a></li>
  <li><a href="account.php">Manage account</a></li>
  <li><a href="contact1.html">Contact us</a></li>
   <li><a href="logout.php">Log out</a></li>
</ul>
</div>
<img src="images/2.jpg" alt="Bookstore" width="995" height="378">
</div>';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$user=$_SESSION["user"];
if(isset($_SESSION['cart'])){
$_SESSION["cart"] = array_unique($_SESSION["cart"]);
$c=$_SESSION["cart"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
foreach($c as $bid){
$sql="select * from book where bid='$bid'";
$result = $conn->query($sql);
    $row = $result->fetch_assoc();
		 $image_name=$row["name"];
         $image_content=$row["photo"];
		 echo '<form action="deletefromcart.php" method="post"><fieldset>';
		 echo '<img id="output_image" src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
        echo "<br>"."Name: " . $row["name"]."<br>". " Author : " . $row["author"]."<br>". " Edition: " . $row["edition"]."<br>"." Publication: " . $row["publication"]."<br>". " Price: " . $row["price"]."<br>"." Owner: " . $row["owner"]."<br>";
				?><input type="hidden" name="bid" value='<?php echo $bid; ?>'>
		<?php
		echo '<div><button type="submit" class="button" >Delete &raquo;</button></div></fieldset></form>';
		}
		
		$amount=0;
foreach($_SESSION["cart"] as $bid)
{
$sql="select price from book where bid='$bid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
$amount=$amount+$row['price'];	
}
}
echo 'The total amount is: '.$amount;
		echo '<form action="buyall.php" method="post"><fieldset>
		<div><button type="submit" class="button" >Buy all &raquo;</button></div></fieldset></form>'
		;

		}
 else {
    echo "0 results";
}


echo '<div class="footer">
<p class="copyright-text">&copy;Designed for IWP Project</p>
</div>
</div>
</div>
</div>
</body>
</html>';
}
?>