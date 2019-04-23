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
  <title>PETstore</title>
  <link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById("output_image");
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
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
  <li><a href="sell.php"> FOUND pet</a></li>
  <li><a href="buy.php"> buy pet</a></li>
  <li><a href="account.php">Manage account</a></li>
  <li><a href="contact1.html">Contact us</a></li>
   <li><a href="logout.php">Log out</a></li>
</ul>
</div>
<img src="09.png" alt="PET STORE" width="99" height="37">
</div>

<form name="myform" class="register" action="sellbook.php" method="post" enctype="multipart/form-data">
            <h1>FOUND pet</h1>
            <fieldset class="row1">
                <p>
                    <label>Name *
                    </label>
                    <input type="text" name="name" class="long" required>
                </p>
                <p>
                    <label>pet name*
                    </label>
                    <input type="text" name="author" class="long" required>
                </p>
                <p>
                    <label>breed*
                    </label>
                    <input type="text" name="edition" class="long" required>
                </p>
				<p>
                    <label>pet *
                    </label>
                    <input type="text" name="pub" class="long" required>
                </p>
				<p> 
                    <label>highet *
                    </label>
                    <input type="text" name="price" class="long" required>
                </p>
				<p>
                    <label>Photo *
                    </label>
                    <input type="file" name="photo" accept="image/*" onchange="preview_image(event)" >
					</br>
					</br>
					<img id="output_image"/>
                </p>
            </fieldset>
            <div><button type="submit" class="button" value="Upload">Sell &raquo;</button></div>
<div><button type="reset" class="button">Clear &raquo;</button></div>

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