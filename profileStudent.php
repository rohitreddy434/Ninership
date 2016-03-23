<?php 

	include 'Student.php';
	
	require 'headerStudent.php';
	if(!isset($_SESSION["userId"]))
		header("location: index.php");
	
	$student = $_SESSION["studentProfile"];
?>
<html>
	<head>
		 <link rel="stylesheet" href="style/formstyle.css">
	</head>

<body>
	<form class="smart-green">	
		<center><h1>My Profile </h1></center>
		<label>
			<span>Name</span>
			<input id="name" type="text" name="name" value = "<?php echo $student->getName();?>" />
		</label>
		
		<label>
			<span>Student Id</span>
			<input id="800#" type="text" name="800#" value = "<?php echo $student->getId();?>"/>
		</label>
		
		<label>
			<span>Address Line 1</span>
			<input id="AddressLine1" type="text" name="AddressLine1" value = "<?php echo $student->getAddress();?>"/>
		</label>
		
		<label>
			<span>Address Line 2</span>
			<input id="AddressLine2" type="text" name="AddressLine2"/>
		</label>
		
		<label>
			<span>City</span>
			<input id="city" type="text" name="city" value = "<?php echo $student->getCity(); ?>"/>
		</label>
		
		<label>
			<span>State</span>
			<input id="state" type="text" name="state" value = "<?php echo $student->getState();?>"/>
		</label>
		
		<label>
			<span>ZIP</span>
			<input id="zip" type="text" name="zip" value = "<?php echo $student->getZipcode();?>"/>
		</label>
		
		<label>
			<span>Phone</span>
			<input id="phone" type="text" name="phone" value = "<?php echo $student->getPhoneNo();?>"/>
		</label>
		
		<label>
			<span>Email</span>
			<input id="email" type="email" name="email" value = "<?php echo $student->getEmailId(); ?>"/>
		</label>
    
		<label>
			<span>Skills</span>
			<textarea id="skills" name="skills"> <?php echo $student->getSkillDescriptions(); ?></textarea>
		</label> 
		
		<label>
			<span>Additional Information</span>
			<textarea id="addinfo" name="addinfo"></textarea>
		</label> 
		   
		<label>
			<span>&nbsp;</span> 
			<!--<input type="button" class="button" value="Edit" /> -->
			<input type="button" class="button" value="Save" />
		</label>    
	</form>
  </div>	
  <br>
  <br>
</body>
</html>