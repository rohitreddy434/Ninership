<?php
require('headerAdmin.php');
$message = ""; 
include 'InternshipOpportunitiesDAO.php';

if (isset ( $_GET ['action'] )) {
	
	$updatedInternship = new InternOppr ();
	$updatedInternship->setId ( $_POST ['id'] );
	
	//if($_GET ['action'] == "S"){
		
	//}
	//else
		if($_GET ['action'] == "D"){
		InternshipOppotunitiesDAO::updateInternshipOpps ( "D", $updatedInternship );

	}
	elseif ($_GET ['action'] == "E") {
		$updatedInternship->setJobTitle ( $_POST ['jobTitle'] );
		$updatedInternship->setJobDesc ( $_POST ['jobDescription'] );
		$updatedInternship->setLocation ( $_POST ['location'] );
		$updatedInternship->setStartDate($_POST['startdate']);
		$updatedInternship->setEndDate($_POST['enddate']);
		$updatedInternship->setNoOfPositions ( $_POST ['noOfPositions'] );
		$updatedInternship->setPay ( $_POST ['pay'] );
		$updatedInternship->setWeeklyHrsRequired ( $_POST ['hoursRequired'] );
		$updatedInternship->setSupervisorId($_POST ['supervisorId']);
		$updatedInternship->setBusinessId($_POST ['businessId']);
		if(isset($_POST['skills'])){
		InternshipOppotunitiesDAO::updateSkills($_POST['skills'],$_POST ['id']);
		}
		InternshipOppotunitiesDAO::updateInternshipOpps ( "E", $updatedInternship );
		
	}
	elseif($_GET['action']=="I"){
		$updatedInternship->setJobTitle ( $_POST ['jobTitle'] );
		$updatedInternship->setJobDesc ( $_POST ['jobDescription'] );
		$updatedInternship->setLocation ( $_POST ['location'] );
		$updatedInternship->setStartDate($_POST['startdate']);
		$updatedInternship->setEndDate($_POST['enddate']);
		$updatedInternship->setNoOfPositions ( $_POST ['noOfPositions'] );
		$updatedInternship->setPay ( $_POST ['pay'] );
		$updatedInternship->setWeeklyHrsRequired ( $_POST ['hoursRequired'] );
		$updatedInternship->setSupervisorId($_POST ['supervisorId']);
		$updatedInternship->setBusinessId($_POST ['businessId']);
		$id=InternshipOppotunitiesDAO::updateInternshipOpps ( "I", $updatedInternship );
		
		if(isset($_POST['skills'])){
			InternshipOppotunitiesDAO::updateSkills($_POST['skills'],$id);
		}
	} 
}

$internships = InternshipOppotunitiesDAO::fetchAllInternships();
?>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Home</title>
<script type="text/javascript">
function clickedViewEdit(id){
	 document.forms[0].action = "InternshipDetails.php?id="+id;
	 document.forms[0].submit();
}

function clickedDelete(id){
	document.forms[0].id.value=id;
	document.forms[0].action = "homeAdmin.php?action=D";
	document.forms[0].submit();
}

function clickedAdd() {
	 document.forms[0].action = "InternshipDetails.php?action=A";
	 document.forms[0].submit();
}

</script> 

</head>
<body>	
	<form class="form1" action="#" method="post">
		
		<center><h1>Internship Details </h1></center>
		
		<div style="background: #fff; margin: 20px;">
		
			<input type="hidden" name="id" id="id" value="">
			<div style="text-align: center;"> <label class="error">	<?php echo $message; ?> </label> </div> 
   			<?php if(count($internships) > 0) { ?>
   				<table>
   					<?php
						for($i = 0; $i < count ( $internships ); $i ++) {
					?>
   				<tr>
					<td class="td1"><?php echo $internships [$i]->getJobTitle(); ?></td>
					<td> <?php echo "<input type=\"button\" onclick=javascript:clickedViewEdit(" . $internships [$i]->getId () . ") value=\"View/Edit Details\">"; ?> </td>
					<td> <?php echo "<input type=\"button\" onclick=javascript:clickedDelete(" . $internships [$i]->getId () . ") value=\"Delete\">"; ?> </td>
				</tr>
				
				<tr>	
					<td><?php echo $internships[$i]->getBusinessName(); ?> </td>
					<td> </td>
					<td> </td>
				</tr>
				<tr>
					<td>Location: <?php echo $internships[$i]->getLocation(); ?></td>
					<td>  </td>
					<td> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
				</tr>
				<?php }?>
				</table>
				<?php } ?>
				<br>
   				<div style="text-align: center">
					<input type="button" class="button" value="Add New" onclick="javascript:clickedAdd()" />
				</div>
			</div>			
	</form>
	</body>
</html>