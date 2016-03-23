<?php 
	include 'InternOppr.php';
	
	session_start();
	if(!isset($_SESSION["userId"]))
		header("location: index.php");
?>
<html>
<head>
<link rel="stylesheet" href="style/reset_profile.css">

<link rel="stylesheet" href="style/internships.css">
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
	<div>
		<form class="form1" method="post" action="StudentInternshipActions.php">
			<center>
				<h1>Available Internships</h1>
			</center>
			<br>
			<center>
				<label> <span class="s1">Semester:</span> <input type="checkbox"
					name="spring">Spring <input type="checkbox" name="fall" />Fall <input
					type="checkbox" name="summer" />Summer
				</label>
			</center>
			<br>
			<div class="bar">
				<i></i>
			</div>
		<?php 
   				$internships;
   				$message;
   				if(isset($_SESSION["internList"]))
   					$internships = $_SESSION["internList"];
   				if(isset($_SESSION["message"]))
   					$message = $_SESSION["message"];

   				if(!empty($message)) {
   					?> 
   					<div style="text-align: center"> <label><?php echo $message;?></label> </div>
   				<?php } 
   				
   				if(count($internships) > 0) {
   				?>
   				<div style = "text-align: right">
   				<input type="submit" name="Submit" class="button" value="Submit" /> </div>
					<table>
					<?php 
						$counter = 0; 	
   						foreach($internships as $intern) {
   						$interestId = "Interest".$counter;
   						$appliedId = "Applied".$counter;
   					?>
					<tr>
						<td class="td1"><?php echo $intern->getJobDesc(); ?></td>
						<td><?php echo $intern->getLocation(); ?></td>
						<?php if($intern->getInterested() == "Y") { ?>
   							<td> <input type="checkBox" checked disabled/> Interested </td>
   						<?php } else { ?>
   							<td> <input type="checkBox" name="<?php echo $interestId; ?>" /> Interested </td>
   						<?php } ?>
					</tr>
					<tr>
						<td><?php echo $intern->getBusinessName(); ?></td>
						<td>Pay: $<?php echo $intern->getPay();?>/hr</td>
						<?php if($intern->getApplied() == "Y") { ?>
							<td> <input type="checkbox" checked disabled/> Apply </td>
						<?php } else { ?>
							<td> <input type="checkbox" name="<?php echo $appliedId; ?>"/> Apply </td>
						<?php }?>
					</tr>
					
					<tr>
						<td>Skills Required: <?php echo $intern->getSkillDescriptions(); ?></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td></td>
					</tr>
					<?php
						$counter++; 
   						}?>	
				</table>
				<div style="text-align: right">
				<input type="submit" name="Submit" class="button" value="Submit" /> </div>
			<?php }
			else {
   				?> <span class="error"> Sorry No Internships are available! </span>
   			<?php }?>	
		</form>
	</div>
	</div>
</body>
</html>

<!--   <div>
   	<form method="post" action="StudentInternshipActions.php">
   		
   		<div style="background: #fff; margin: 20px;">
   			<?php 
   				/*$internships;
   				$message = "";
   			
   				if(isset($_SESSION["internList"]))
   					$internships = $_SESSION["internList"];
   				if(isset($_SESSION["message"]))
   					$message = $_SESSION["message"];
   				if(!empty($message)) {
   				?>	
   				<div style="text-align: center;"> <label class="error">	<?php echo $message; ?> </label> </div> 
   				<br><br>
   				<?php 	
   				}   			
   				if(count($internships) > 0) {
   				?>
   				<div style="margin: 10px;">
   					<table style="width: 100%">
   						<tr>
   							<th> Internship Id </th>
  							<th> Job Description </th> 							
   							<th> Organization </th>
   							<th> Job Title </th>
   							<th> Skills Required </th>
   							<th> Pay </th>
   							<th> Start date </th>
   							<th> End date </th>
   							<th> Weekly Work Hours</th>
   							<th> Location </th>
   							<th> No of positions </th>
   							<th> Interested </th>
   							<th> Apply </th>			
		  				</tr>
   					<?php
   						$counter = 0; 	
   						foreach($internships as $intern) {
   							$interestId = "Interest".$counter;
   							$appliedId = "Applied".$counter;
   					?>
   					<tr>
   						<td><?php echo $intern->getId(); ?></td>
   						<td><?php echo $intern->getJobDesc(); ?></td>
   						<td><?php echo $intern->getBusinessName(); ?></td>
   						<td><?php echo $intern->getJobTitle(); ?></td>
   						<td><?php echo $intern->getSkillDescriptions();?> </td>
   						<td><?php echo $intern->getPay(); ?></td>
   						<td><?php echo $intern->getStartDate(); ?></td>
   						<td><?php echo $intern->getEndDate(); ?></td>
   						<td><?php echo $intern->getWeeklyHrsRequired(); ?></td>
   						<td><?php echo $intern->getLocation(); ?></td>   						
   						<td><?php echo $intern->getNoOfPositions(); ?></td>
   						
   						<?php if($intern->getInterested() == "Y") { ?>
   						<td> <input type="checkBox" checked disabled/> </td>
   						<?php } else { ?>
   						<td> <input type="checkBox" name="<?php echo $interestId ?>" /> </td>
   						<?php } if($intern->getApplied() == "Y") { ?>
   						<td> <input type="checkbox" checked disabled/> </td>
   						<?php } else { ?>
   						<td> <input type="checkbox" name="<?php echo $appliedId ?>"/> </td>
   						<?php }?>
   					</tr>	
   				<?php
   					$counter = $counter + 1; 	
   				}
   				?>
   				</table>
   				<br>
   				<br>
   				<div style="text-align: center">
   					<input type="submit" name="Submit" value="Submit" />
   				</div>
   				<br>
   			<?php 
   			} else {
   				?> <span class="error"> Sorry No Internships are available! </span>
   			<?php 
   			}*/
   		?> 
   		</div>
   	</div>
   	</form>	
  </div>  
</body>
</html> -->