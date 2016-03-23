<?php
session_start();
$welcomeString="";
if(isset($_SESSION['username'])){
$welcomeString ="Welcome ".$_SESSION['username'];
		echo $welcomeString;
}
?>
<html>

<head>

<meta charset="UTF-8">

<title>profileStudent</title>

<link rel="stylesheet" href="style/reset_profile.css">

<link rel="stylesheet" href="style/profileStudent.css">
</head>

<body>
<br>
<div class="avatar">
<img class="img1" src="image/logo.png">
<center><h1 class="niner">NINERSHIP</h1></center>
<?php echo "<h2>".$welcomeString."</h2>"?>
</div>
<div class="nav">
<center>
<ul>
<li><a href="homeStudent.html">Home</a></li>
<li><a href="profileStudent.html">My Profile</a></li>
<li><a href="internships.html">Internships</a></li>
<li><a href="newBusiness.php">Business</a></li>
<li><a href="index.php?reason=logout">Log Out</a></li>
</ul>
</center>
</div>
<div>

</div>
</body>
</html>