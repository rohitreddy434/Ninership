<?php
	include 'database.php';
	
    // If the values are posted, insert them into the database.
    	
    //if (isset($_POST['username']) && isset($_POST['password'])){    	
	if (isset($_POST['submit'])){
	    	    	
    	$password = $_POST['password'];
    	$firstname = $_POST['fname'];
    	$lastname = $_POST['lname'];
    	$birthdate = $_POST['startdate'];
    	$email = $_POST['email_id'];
    	$gender = $_POST['gender']; 
    	$address = "";
    	$city = "";
    	$phone = "";
    	$state = "";
    	$zip = "";
   	
    	//echo "<script type='text/javascript'>alert('$password');</script>";
    	//echo "<script type='text/javascript'>alert('$firstname');</script>";
    	try{
    	$connection = Database::connect();
    	
    	// prepare a statement and execute it by
    	// calling the stored procedure
    	$stmt = $connection->prepare("CALL newUser(:1, :2, :3, :4, :5 ,:6, :7, :8, :9, :10, :11 , @output)");
    	// One bindParam() call per parameter
    	//$stmt->bindParam(1, $username, PDO::PARAM_STR);
    	$stmt->bindParam(':1', $address, PDO::PARAM_STR);
    	$stmt->bindParam(':2', $city, PDO::PARAM_STR);
    	$stmt->bindParam(':3', $email, PDO::PARAM_STR);
    	$stmt->bindParam(':4', $firstname, PDO::PARAM_STR);
    	$stmt->bindParam(':5', $lastname, PDO::PARAM_STR);
    	$stmt->bindParam(':6', $phone, PDO::PARAM_INT);
    	$stmt->bindParam(':7', $state, PDO::PARAM_STR);
    	$stmt->bindParam(':8', $zip, PDO::PARAM_INT);
    	$stmt->bindParam(':9', $birthdate, PDO::PARAM_INT);
    	$stmt->bindParam(':10', $gender, PDO::PARAM_STR);
    	$stmt->bindParam(':11', $password, PDO::PARAM_STR);
    	
    	$stmt->execute();
    	$stmt->closeCursor(); 
    	
    	$select = $connection->query("SELECT @output as output")->fetch(PDO::FETCH_ASSOC);    	
    	
    	} catch (PDOException $pe) {
    		die("Error occurred:" . $pe->getMessage());
    	}
    	
    	//echo "<script type='text/javascript'>alert('$procOutput');</script>";
       
        if($select){
            $msg = "User Created Successfully";
           // echo "<script type='text/javascript'>alert('$msg');</script>";
            
			session_start();
            $_SESSION['login'] = "1";
            $_SESSION['userId'] = $_POST['email_id'];
			$_SESSION['username'] = $_POST['email_id'];            
           
           header("Location: StudentDetails.php");            
		} else
        {   
        	$error = "Invalid Credentials.Please register again";
        	//echo "<script type='text/javascript'>alert('$error');</script>";
        	header("Location: register.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Ninership Registration
	</title>	
	<link rel="stylesheet" href="style/reset.css">
  	<link rel="stylesheet" href="style/style.css">
  	 <link rel="stylesheet" href="style/internships.css">
  	 
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-simple-datetimepicker-1.12.0/jquery.simple-dtpicker.js"></script>
	<script type="text/javascript" src="scripts/JqueryDTPicker.js"></script>
	<link type="text/css" href="scripts/jquery-simple-datetimepicker-1.12.0/jquery.simple-dtpicker.css" rel="stylesheet" />
	<meta charset="UTF-8">  	
</head>
<body>
    <!-- Form for logging in the users -->
	<div class="register-form">
	<?php
		if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 	?>
 	<form action="" method="POST">
		<div class="wrap">
		<center><h1 class="niner">NINERSHIP</h1></center>
	<br>
		<div class="avatar">
			<img src="image/logo.png">
		</div>

		<input id = "fname" type="text" name="fname" placeholder="First Name" required>
		<div class="bar">
			<i></i>
		</div>		
		<input id = "lname" type="text" name="lname" placeholder="Last Name" required>
		<div class="bar">
			<i></i>
		</div>
		<input id = "email_id" type="email_id" name = "email_id"  placeholder="Email" required>
		<div class="bar">
			<i></i>
		</div>
		<input id = "password" type="password" name="password" placeholder="Password" required>
		<div class="bar">
			<i></i>
		</div>		
		<input id="startdate" type="text" name="startdate" placeholder = "Birthdate" required>		
		<div class="bar">	
			<i></i>
		</div>
		<input list="genders" name="gender" placeholder = "gender" required> <datalist id="genders">
		  <option value="Female">
		  <option value="Male">
		 </datalist>		 		
		<br>
		<div style="width:275px;">		
		<div style="float: right; width: 200px"> 
		<button><input id="submit" class="btn register" type="submit" name="submit" value="Sign Up"/></button>
		</div>
		</div>		 		
		</form>
	</div>
</body>
</html>