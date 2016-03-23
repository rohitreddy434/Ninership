<?php
require 'headerAdmin.php';
include 'InternshipOpportunitiesDAO.php';
$internshipData = new InternOppr();
$supervisorName = "";
$id="";
$action="E";
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$internshipData = InternshipOppotunitiesDAO::fetchOneInternship($_GET['id']);
	$supervisorName = $internshipData->getSupervisorFname().' '.$internshipData->getSupervisorLname();
}
if(isset($_GET['action'])) {
	$action = $_GET['action'];
}
?>

<html>
<head>

   <script type="text/javascript">
	function test() {
		window.open('supervisorLookup.php','popup_form','width=700 height=700 left=500 top=100');
	}

  function clickedSubmit(){
	  var action = document.getElementById('act').value;
	  if(action == "E") {
	  		document.forms[0].action="homeAdmin.php?action=E";
		} else {
			document.forms[0].action="homeAdmin.php?action=I";	
		}
			document.forms[0].submit();
  }

  function clickedClose(){
	  document.forms[0].action="homeAdmin.php?action=N";
		document.forms[0].submit();
		  
  }

  </script>
  <link rel="stylesheet" href="style/formstyle.css">
</head>
<form class="smart-green" method= "post">
<input type="hidden" id="id" name ="id" value = "<?php echo $internshipData->getId();?>"/>
<input type="hidden" id="supervisorId" name ="supervisorId" value = "<?php echo $internshipData->getSupervisorId();?>">
<input type="hidden" id="businessId" name ="businessId" value = "<?php echo $internshipData->getBusinessId();?>">
<center><h1>Internship Details </h1></center>
		<input type="hidden" id="act" name="act" value="<?php echo $action;?>" />
		<label>
			<span>Job Title</span>
			<input id="jobTitle" type="text" name="jobTitle" value = "<?php echo $internshipData->getJobTitle()?>"/>
		</label>
		
		<label>
			<span>Job Description</span>
			<input id="jobDescription" type="text" name="jobDescription" value="<?php echo $internshipData->getJobDesc()?>"/>
		</label>
		
		<label>
			<span>pay</span>
			<input id="pay" type="text" name="pay" value="<?php echo $internshipData->getPay()?>"/>
		</label>
		
		<label>
			<span>location</span>
			<input id="location" type="text" name="location" value = "<?php echo $internshipData->getLocation()?>"/>
		</label>
		
		<label>
			<span>No of positions</span>
			<input id="noOfPositions" type="text" name="noOfPositions" value = "<?php echo $internshipData->getNoOfPositions()?>"/>
		</label>
		
		<label>
			<span>Weekly Hours</span>
			<input id="hoursRequired" type="text" name="hoursRequired" value = "<?php echo $internshipData->getWeeklyHrsRequired()?>"/>
		</label>
		<label>
			<span>Start date</span>
			<input id = "startdate" type="text" name="startdate" value="<?php echo $internshipData->getStartDate()?>" placeholder="yyyy-mm-dd" required>
		</label>
		<label>
			<span>End date</span>
			<input id = "enddate" type="text" name = "enddate" value="<?php echo $internshipData->getEndDate()?>" placeholder="yyyy-mm-dd" >
		</label>
		<label>
			<span>Supervisor</span>
			<input id="supervisorName" type="text" name="supervisorName" value= "<?php echo $supervisorName?>" onclick="test()" readonly="true"/>
		</label>
		<label>
			<span>Skills Required</span>
		<?php echo InternshipOppotunitiesDAO::getSkillsForInternship($id)?>
		</label>
		<label>
			<span>&nbsp;</span> 
			<!--<input type="button" class="button" value="Edit" /> -->
			<input type="button" class="button" value="Submit" onclick="javascript:clickedSubmit()"/>
		    <input type="button" class="button" value="Close" onclick="javascript:clickedClose()"/>
			
		</label>    
	</form>
</html>