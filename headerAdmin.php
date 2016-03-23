<?php 

session_start()?>
<html>
<head>	
	
 
 <link rel="stylesheet" href="style/reset_profile.css">
 
<link rel="stylesheet" href="style/internships.css">
  
 	 <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-simple-datetimepicker-1.12.0/jquery.simple-dtpicker.js"></script>
	<script type="text/javascript" src="scripts/JqueryDTPicker.js"></script>
	<link type="text/css" href="scripts/jquery-simple-datetimepicker-1.12.0/jquery.simple-dtpicker.css" rel="stylesheet" />
	<meta charset="UTF-8">  

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
        <li><a href="homeAdmin.php">Home</a></li>
		<li><a href="newBusiness.php">Manage Business</a></li>
		<li>  <a href="studentPlacement.php">Placements</a></li>
		<li><a href="logout.php">Log Out</a></li>
      </ul>
      </center>
  </div>  
   
  </body>
  </html>