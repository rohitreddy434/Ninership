<?php
session_start();
$errorMessage="";
if(isset($_GET['reason'])){
	if($_GET['reason']=="invalid"){
		$errorMessage = "Invalid UserName or Password";
		$_GET['reason']=="";
	}
	if($_GET['reason']=="logout")
		$errorMessage = "User Successfully logged out.";
session_unset();
session_destroy();
}


?>
<html>

<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel="stylesheet" href="style/reset.css">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>	
<form method="post" action="logic/ValidateUser.php">
  <div class="wrap">
	<center><h1 class="niner">NINERSHIP</h1></center>
	<div align="center" style="color: red;">
	<?php echo "<h2>".$errorMessage."</h2>";?>
	</div>
	<br>
		<div class="avatar">
			<img src="image/logo.png">
		</div>
		<input style="width: 100%" type="text" id="username" name="username" placeholder="xyz@abc.com" required>
		<div class="bar">
			<i></i>
		</div>
		<input style="width: 100%" class="password1" id="password" name = "password" type="password" placeholder="Password" required>
		<a href="forgotPassword.html" class="forgot_link">Forgot?</a>
		<br>
		<br>
		<div style="width:275px;">		
		<div style="float: right; width: 200px"> 
		<a href="logic/ValidateUser.php"><button>Sign in</button></a>
		</div>
		</div>
		<br>
		<br>
	</form>
	<br>
	<form method="post" action="register.php"> 
		<div style="width:275px;">
		<div style="float: right; width: 200px">	
		<a href="register.php"><button>Sign up</button></a>
		</div>
		</div>
	</div>
	</form>	
</body>
</html>
