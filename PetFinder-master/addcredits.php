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
  <link href="style.css" rel="stylesheet" type="text/css">
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
</div>

<form name="myform" class="register" action="add.php" method="post">
            <h1>Add credits</h1>
                <p>
                    <label>Credits wanted *
                    </label>
                    <input type="text" name="credits" class="long" required>
                </p>
				</br>
				</br>
				<div><button type="submit" class="button" >Add credits &raquo;</button></div>
</form>
<div class="footer">
<p class="copyright-text">&copy;Designed for IWP Project</p>
</div>
</div>
</div>
</div>
</body>
</html>';
}
?>