<?php
	include 'InternshipOpportunitiesDAO.php';	

	session_start();
	
	$placements = InternshipOppotunitiesDAO::fetchAllPlacements();
	$_SESSION["placeList"] = $placements;
	if(isset($_SESSION["message"]))
		unset($_SESSION["message"]);
	header("location: studentPlacementList.php"); // Redirecting To Other Page
?>