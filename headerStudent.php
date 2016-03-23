<?php 

session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>profileStudent</title>
  <link rel="stylesheet" href="style/reset_profile.css">
  <link rel="stylesheet" href="style/home.css">
</head>
<body>
  <div class="avatar">
	<img class="img1" src="image/logo.png">
	<center><h1 class="niner">NINERSHIP</h1></center>
  </div> 
 	<div style="float: right; font-weight: bold">
 		<label>Welcome, <?php echo $_SESSION["username"];?></label>
 	</div>
 	<br> 
  <div class="nav">
	<center>
		<ul>
        <li><a href="StudentDetails.php">Home</a></li>
		<li><a href="StudentSkills.php">My Profile</a></li>
		<li><a href="InternshipOpportunities.php">Internships</a></li>
		<li><a href="logout.php">Log Out</a></li>
      </ul>
     </center>
  </div>  
  </body>
  </html>