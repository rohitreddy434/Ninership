<?php
	include 'InternshipOpportunitiesDAO.php';	

	session_start();

	$studentId = $_SESSION["userId"];
	$internships = InternshipOppotunitiesDAO::fetchInternship();
	$internships = InternshipOppotunitiesDAO::fetchInterestsForStudent($studentId, $internships);
	
	$_SESSION["internList"] = $internships;
	if(isset($_SESSION["message"]))
		unset($_SESSION["message"]);
	header("location: internships.php"); // Redirecting To Other Page
?>