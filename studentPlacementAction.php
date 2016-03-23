<?php
	include 'InternshipOpportunitiesDAO.php';
	session_start();
	
	$message = "";
	if(isset($_POST['Submit'])) {
		processAction();
		//echo $_SESSION["message"];
		header("location: studentPlacementList.php");
	 }

	 function processAction() {
	 	//$studentId = $_SESSION["userId"];
	 	$placement = $_SESSION["placeList"];
	 	
	 	
	 	
	 	$flag = false;
	 	for($i = 0; $i < count($placement); $i++) {
	 		$studEval = array();
	 		$sprEval = array();
	 		$studEvalId = "studEval".$i;
	 		$sprEvalId = "sprEval".$i;
	 		echo $i;
	 		
	 		if(isset($_POST[$studEvalId])) {
	 			$studEval[] = $placement[$i];
	 			//echo $placement[$i]->getStudentId();
	 			processStudEval($studEval, $placement[$i]->getStudentId());
	 			$flag = true;
	 		}
	 		if(isset($_POST[$sprEvalId])) {
	 			$sprEval[] = $placement[$i];
	 			processSprEval($sprEval, $placement[$i]->getStudentId());
	 			$flag = true;
	 		}
	 	}
	 	
	 	if(!$flag) {
	 		$message = "Please check on student and supervisor evaluation!";
	 		$_SESSION["message"] = $message;
	 	} else {
	 		/* if(count($studEval) > 0) {
	 			processStudEval($studEval, $studentId);
	 		}
	 		if(count($sprEval) > 0) {
	 			processSprEval($sprEval, $studentId);
	 		} */
	 		echo "hi";
	 		$placements = InternshipOppotunitiesDAO::fetchAllPlacements();
	 		$_SESSION["placeList"] = $placements;
	 		$message = "Requested action has been performed successfully!!";
	 		$_SESSION["message"] = $message;
	 	}
	 }
	 
	 function processStudEval($studEval, $studentId) {
	 	echo "hi" . $studentId;
	 	foreach($studEval as $interest) {
	 		$internshipId = $interest->getId();
	 		InternshipOppotunitiesDAO::insertIntoPlacements($studentId, $internshipId, "studentEval");
	 	}
	 }
	
	 function processSprEval($sprEval, $studentId) {
	 	foreach($sprEval as $interest) {	 		
	 			$internshipId = $interest->getId();
	 			InternshipOppotunitiesDAO::insertIntoPlacements($studentId, $internshipId, "supervisorEval");	 	
	 	}
	 }
?>