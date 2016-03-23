<?php
include 'InternshipOpportunitiesDAO.php';

session_start();
if(!isset($_SESSION["userId"]))
	header("location: index.php");

$studentId = $_SESSION["userId"];
$interests = InternshipOppotunitiesDAO::fetchStudentInterests($studentId);
echo count($interests);
$placements = InternshipOppotunitiesDAO::fetchStudentPlacements($studentId);
echo count($placements);

$_SESSION["interestList"] = $interests;
$_SESSION["placements"] = $placements;

if(isset($_SESSION["message"]))
	unset($_SESSION["message"]);
header("location: homeStudent.php"); // Redirecting To Other Page
?>