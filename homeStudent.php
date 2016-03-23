<?php 
	include 'InternOppr.php';
	include 'Placement.php';
	require 'headerStudent.php';
	
	if(!isset($_SESSION["userId"]))
		header("location: index.php");
?>
<html>
<body>
   <div class="form1">
   		<center><h1>Home</h1></center>
		<br>
		<br>
		<div>
   		<?php 
   			$interests;
   			$placements;   			
   			if(isset($_SESSION["interestList"]))
   				$interests = $_SESSION["interestList"];
   			if(isset($_SESSION["placements"]))
   				$placements = $_SESSION["placements"];
   			if(isset($_SESSION["message"]))
   				$message = $_SESSION["message"];  			
   			if((isset($_SESSION["interestList"])) && (count($interests) > 0)) {
   		?>
   		<div>
   			<center><h2>Interested In</h2></center>
			<table>
				<tr>
					<th>Title</th>
					<th>Job Description</th>
					<th>Company</th>
					<th>Starting Date</th>
					<th>End Date</th>
					<th>Salary</th>
					<th>Location</th>
					<th>Applied?</th>
				</tr>
   			<?php
   				foreach($interests as $interest) {
   				?>
   					<tr>
   						<td><?php echo $interest->getJobTitle(); ?></td>
   						<td><?php echo $interest->getJobDesc(); ?> </td>	
   						<td><?php echo $interest->getBusinessName(); ?></td>
   						<td><?php echo $interest->getStartDate(); ?></td>
   						<td><?php echo $interest->getEndDate(); ?></td>
   						<td>$<?php echo $interest->getPay(); ?>/hr</td>
   						<td><?php echo $interest->getLocation(); ?></td>
   						<?php if($interest->getApplied() == 'Y') {?>
   						<td>Yes</td>
   						<?php } else {?>
   						<td>No</td> <?php }?>
   					</tr>
   				<?php 
   				}
   			?></table>
			<br>
			<br>
			<br>
			 <?php 
   			} ?>
   			
   			<?php 
   			if((isset($_SESSION["placements"])) && (count($placements) > 0)) {
   			?>
   			<center><h2>Placed In</h2></center>
			<table>
				<tr>
					<th>Title</th>
					<th> Description </th>
					<th>Company</th>
					<th>Starting Date</th>
					<th>End Date</th>
					<th>Salary</th>
					<th>Location</th>
				</tr>
   			<?php 
   				foreach($placements as $pl) {
   				?>
   				<tr>
   					<td><?php echo $pl->getJobTitle(); ?></td>
   					<td><?php echo $pl->getJobDescription(); ?></td>
   					<td><?php echo $pl->getBusinessName(); ?></td>
   					<?php if(empty($pl->getPlacementStartDate())) { ?>
   						<td><?php echo $pl->getInternshipStartDate(); ?></td>
   						<td><?php echo $pl->getInternshipEndDate(); ?></td>
   					<?php } else { ?>
  	 					<td><?php echo $pl->getInternshipStartDate(); ?></td>
   						<td><?php echo $pl->getInternshipEndDate(); ?></td>
   					<?php } ?>
   					<td> $<?php echo $pl->getPay();?>/hr </td>
   					<td> <?php echo $pl->getLocation();?> </td>
   				</tr>
   			<?php } ?>
   			</table>
   			<?php 
   			}
   			?>
   	</div>
  </div>  
</body>
</html>