<?php 
require 'headerAdmin.php';
?>

<head>


  <title>Admin Profile</title>
  
</head>

   <br>
   <br>  
   <div>
	<form class="smart-green">
		<center><h1>My Profile </h1></center>
		
		<label>
			<span>Admin Name</span>
			<input id="name" type="text" name="name"/>
		</label>
		
		<label>
			<span>Company</span>
			<input id="800#" type="text" name="800#"/>
		</label>
		
		<label>
			<span>Address Line 1</span>
			<input id="AddressLine1" type="text" name="AddressLine1"/>
		</label>
		
		<label>
			<span>Address Line 2</span>
			<input id="AddressLine2" type="text" name="AddressLine2"/>
		</label>
		
		<label>
			<span>City</span>
			<input id="city" type="text" name="city"/>
		</label>
		
		<label>
			<span>State</span>
			<input id="state" type="text" name="state"/>
		</label>
		
		<label>
			<span>ZIP</span>
			<input id="zip" type="text" name="zip"/>
		</label>
		
		<label>
			<span>Phone</span>
			<input id="phone" type="text" name="phone"/>
		</label>
		
		<label>
			<span>Email</span>
			<input id="email" type="email" name="email"/>
		</label>
    
		<label>
			<span>Skills</span>
			<textarea id="skills" name="skills"></textarea>
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