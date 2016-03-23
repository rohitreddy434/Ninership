<?php
	include 'database.php';
	include 'Student.php';
	include_once 'Skills.php';
	
	session_start();
	if(!isset($_SESSION["userId"]))
		header("location: index.php");
	
	$studentId = $_SESSION['userId'];
	$connection = Database::connect();
	$query = "select user_id, concat(lname, ',', fname) as name, address, city, state, zipcode, phone, email_Id "
			 . "from user u where u.user_id = '$studentId'";
		
	$statement = $connection->prepare($query);
	$result = $statement->execute();
	
	$student = new Student();
	if($result) {
		while($row = $statement->fetchObject()) {
			$student->setId($row->user_id);
			$student->setName($row->name);
			$student->setAddress($row->address);
			$student->setCity($row->city);
			$student->setState($row->state);
			$student->setZipcode($row->zipcode);
			$student->setPhoneNo($row->phone);
			$student->setEmailId($row->email_Id);
			
			$Skillsquery = "select skill_name, skill_level from skills natural join student_skill where student_id = '$studentId'";
			$stmnt = $connection->prepare($Skillsquery);
			$skillsResult = $stmnt->execute();
				
			$skills = array();
			if($skillsResult) {
				while($Skillrow = $stmnt->fetchObject()) {
					$skill = new Skills();
					$skill->setSkillName($Skillrow->skill_name);
					$skill->setLevel($Skillrow->skill_level);
					$skills[] = $skill;
				}
			}
			$student->setSkills($skills);
		}
	}
	
	Database::disconnect();
	
	echo $student->getId();
	echo $student->getName();
	$_SESSION["studentProfile"] = $student;
	header("location: profileStudent.php");
?>