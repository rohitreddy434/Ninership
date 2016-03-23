<?php
include 'Placement.php';
require 'headerAdmin.php';
if (! isset ( $_SESSION ["userId"] ))
	header ( "location: index.php" );

?>

<html>
<head>
<meta charset="UTF-8">
<title>Students Placed</title>
</head>
<body>	

	<form class="form1" method="post" action="AddPlacementNew.php">
 			<center><h1>PLACEMENT DETAILS</h1></center>
 			<br>
			<div class="bar">
			
			<center><td class='td3'><input class="button" type="submit" name="Add" value="Add Placement" /></td></center>
			
		</div>
	</form>
	
	<form class="form1" method="post" action="studentPlacementAction.php">
		<?php
			$placements;
			$message = "";
					
			if (isset ( $_SESSION ["placeList"] ))
				$placements = $_SESSION ["placeList"];
			if (isset ( $_SESSION ["message"] ))
				$message = $_SESSION ["message"];
			if (! empty ( $message )) {
		?>	
   		<div style="text-align: center;">
			<label class="error">	<?php echo $message; ?> </label>
		</div>
		<br> <br>   			 
   		<?php
			}
			if (count ( $placements ) > 0) {
		?>
   		<table>
			<?php
				$counter = 0;
				foreach ( $placements as $placed ) {
					$studEvalId = "studEval" . $counter;
					$sprEvalId = "sprEval" . $counter;
			?>
			<tr>
				<td> <?php echo $placed->getName();?> </td>
				<td><?php echo $placed->getBusinessName(); ?></td>
				<td> <?php if($placed->getStudentEval() == "Y") { ?>
   						<input type="checkBox" checked disabled /> Student Evaluation
   					 <?php } else { ?>
   						<input type="checkBox" name="<?php echo $studEvalId ?>" /> Student Evaluation
   					<?php }?>
				</td>
			</tr>
			<tr>
				<td><?php echo $placed->getJobTitle(); ?> </td>
				<td> </td>
				<td> <?php if($placed->getSupervisorEval() == "Y") { ?>
   						<input type="checkbox" checked disabled /> Supervisor Evaluation
   					 <?php } else { ?>
   						<input type="checkbox" name="<?php echo $sprEvalId ?>" /> Supervisor Evaluation
   					<?php }?>
   				</td>
			</tr>
			
			<tr>
				<td> Start date: <?php if(!empty($placed->getPlacementStartDate())) {  
					echo $placed->getPlacementStartDate(); 
				} else {
					echo $place -> getInternshipStartDate(); 
				}?>
				</td>
						
				<td> End date: <?php if(!empty($placed->getPlacementEndDate())) {  
					echo $placed->getPlacementEndDate(); 
				} else {
					echo $place -> getInternshipEndDate(); 
				}?>
				</td>
				
			</tr>
			
				<tr>
						<td>&nbsp;</td>
						<td></td>
						<td></td>
					</tr>	
			<?php
				$counter = $counter + 1;
				}
			?>
   			</table>
   			<br>
			<div style="text-align: center">
				<input type="submit" name="Submit" class="button" value="Submit" />
			</div>		
   			<?php
				} else {
			?> <span class="error"> Sorry No Internships are available! </span>
   			<?php
				}
			?>
	</form>	
	</div>
</body>
</html>