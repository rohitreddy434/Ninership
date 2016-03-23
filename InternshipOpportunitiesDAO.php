<?php
	include 'database.php';
	include 'InternOppr.php';
	include 'Placement.php';
	include 'logic/SupervisorBean.php';
	
	Class InternshipOppotunitiesDAO {
	
		public static function fetchInternship() {
			$connection = Database::connect();
			$today = date('Y-m-d');
			$query = "select internship_id, job_description, job_title, pay, start_date, end_date, weekly_hours_req, location, post_date, no_of_positions, business_name ".
				"from internship_opportunities io natural join business where is_deleted='N' ";
			
			$internships = array();
	
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$io = new InternOppr();
					$io->setBusinessName($row->business_name);
					$io->setId($row->internship_id);
					$io->setJobDesc($row->job_description);
					$io->setJobTitle($row->job_title);
					$io->setLocation($row->location);
					$io->setPostDate($row->post_date);
					$io->setStartDate($row->start_date);
					$io->setEndDate($row->end_date);
					$io->setNoOfPositions($row->no_of_positions);
					$io->setPay($row->pay);
					$io->setWeeklyHrsRequired($row->weekly_hours_req);
					$io->setApplied("N");
					$io->setInterested("N");
				
					$internId = $row->internship_id;
					$Skillsquery = "select skill_name, qual_level from skills natural join qualification where internship_id = $internId";
					$stmnt = $connection->prepare($Skillsquery);
					$skillsResult = $stmnt->execute();
					
					$skills = array();
					if($skillsResult) {
						while($Skillrow = $stmnt->fetchObject()) {
							$skill = new Skills();
							$skill->setSkillName($Skillrow->skill_name);
							$skill->setLevel($Skillrow->qual_level);
							$skills[] = $skill;
						}
					}
					$io->setSkillsList($skills);
					$internships[] = $io;
				}
			}
			Database::disconnect();
			return($internships);
		}
		
		public static function fetchOneInternship($id) {
			$connection = Database::connect();
			$today = date('Y-m-d');
			//$id<-(string)$id;
			$query = "select internship_id, job_description, job_title, pay, start_date, end_date, weekly_hours_req, location, post_date, no_of_positions, business_name,fname,lname,u.user_id as user_id, b.business_id ".
					"from internship_opportunities io, business b,user u where io.user_id= u.user_id and io.business_id = b.business_id and internship_id = '$id'";
		
			$internships = array();
		
			$statement = $connection->prepare($query);
			$result = $statement->execute();
		
			if($result) {
				$row = $statement->fetchObject();
				$io = new InternOppr();
				$io->setBusinessName($row->business_name);
				$io->setId($row->internship_id);
				$io->setJobDesc($row->job_description);
				$io->setJobTitle($row->job_title);
				$io->setLocation($row->location);
				$io->setPostDate($row->post_date);
				$io->setStartDate($row->start_date);
				$io->setEndDate($row->end_date);
				$io->setNoOfPositions($row->no_of_positions);
				$io->setPay($row->pay);
				$io->setWeeklyHrsRequired($row->weekly_hours_req);
				$io->setSupervisorId($row->user_id);
				$io->setSupervisorFname($row->fname);
				$io->setSupervisorLname($row->lname);
				$io->setBusinessId($row->business_id);
			
				Database::disconnect();
				return($io);
		
			}
		}
		
		
		public static function fetchAllInternships() {
			$connection = Database::connect();
			$today = date('Y-m-d');
			$query = "select internship_id, job_description, job_title, pay, start_date, end_date, weekly_hours_req, location, post_date, no_of_positions, business_name, b.business_id as business_id ".
					"from internship_opportunities io natural join business b where is_deleted='N'";
				
			$internships = array();
		
			$statement = $connection->prepare($query);
			$result = $statement->execute();
				
			if($result) {
				while($row = $statement->fetchObject()) {
					$io = new InternOppr();
					$io->setBusinessName($row->business_name);
					$io->setId($row->internship_id);
					$io->setJobDesc($row->job_description);
					$io->setJobTitle($row->job_title);
					$io->setLocation($row->location);
					$io->setPostDate($row->post_date);
					$io->setStartDate($row->start_date);
					$io->setEndDate($row->end_date);
					$io->setNoOfPositions($row->no_of_positions);
					$io->setPay($row->pay);
					$io->setWeeklyHrsRequired($row->weekly_hours_req);
					$io->setBusinessId($row->business_id);
					$internships[] = $io;
				}
			}
			Database::disconnect();
			return($internships);
		}
		
		public static function fetchStudentInterests($studentId) {
			$connection = Database::connect();
			$query = "select i.internship_id,job_description, job_title, pay, start_date, end_date, location, business_name, applied " 
				. "from (interest i natural join internship_opportunities) natural join business where student_id = '$studentId'";

			$internships = array();
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$io = new InternOppr();
					$io->setBusinessName($row->business_name);
					$io->setId($row->internship_id);
					$io->setJobDesc($row->job_description);
					$io->setJobTitle($row->job_title);
					$io->setLocation($row->location);
					$io->setStartDate($row->start_date);
					$io->setEndDate($row->end_date);
					$io->setPay($row->pay);
					$io->setApplied($row->applied);
					$internships[] = $io;
				}
			}
			Database::disconnect();
			return($internships);
		}	
		
		public static function fetchStudentMaxWorkHr($studentId) {
			$connection = Database::connect();
			$query = "select sum(weekly_hours_req) as maxhrs from internship_opportunities io join placement p on p.internship_id = io.internship_id where p.student_id = '$studentId'";
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			$maxHrs = 0;
			if($result) {
				$row = $statement->fetchObject();
				$maxHrs = $row->maxhrs;
			}
			return($maxHrs);
		}
		
		public static function fetchInterestsForStudent($studentId, $internshipList) {
			$connection = Database::connect();
			$query = "select internship_id, applied from interest where student_id = '$studentId'";
			
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$internshipId = $row->internship_id;
					$applied = $row->applied;
					for($i = 0; $i < count($internshipList); $i++) {
						if($internshipList[$i]->getId() === $internshipId) {
							$internshipList[$i]->setApplied($applied);
							$internshipList[$i]->setInterested("Y");
							break;
						}
					}
					
				}
			}
			Database::disconnect();
			return($internshipList);
		}
		
		public static function insertIntoInterests($studentId, $internshipId, $flag) {
			$connection = Database::connect();
			$applied = "N";
			if($flag == "Interest") {
				$query = "insert into interest (student_id, internship_id, applied) values ('$studentId', '$internshipId', '$applied')";
				$query = $connection->prepare($query);
				$query->execute();
			} else {
				$applied = self::doesExist($studentId, $internshipId);
				if($applied) {
					$query = "update interest set applied = 'Y' where student_id = $studentId and internship_id = $internshipId";
				} else {
					$query = "insert into interest (student_id, internship_id, applied) values ('$studentId', '$internshipId', 'Y')";
				}	
				$query = $connection->prepare($query);
				$query->execute();
			}
			Database::disconnect();
		}
		
		public static function doesExist($studentId, $internshipId) {
			$connection = Database::connect();
			$query = "select applied from interest where student_id = '$studentId' and internship_id = '$internshipId'";
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			$applied = false;
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$applied = true;
					break;
				}
			}
			return $applied;
		}
		
		public static function updateInternshipOpps($action,$internship){
			$connection = Database::connect();
			//$internship = new InternOppr();
			$internshipId= $internship->getId();
			$jobTitle = $internship->getJobTitle();
			$jobDescription = $internship->getJobDesc();
			$pay = $internship->getPay();
			$weekHours = $internship->getWeeklyHrsRequired();
			$location = $internship->getLocation();
			$positions = $internship->getNoOfPositions();
			$startDate = $internship->getStartDate();
			$endDate = $internship->getEndDate();
			$supervisorId=$internship->getSupervisorId();
			$businessId =$internship->getBusinessId();
			$query = "CALL update_internship_opp('$action','$jobDescription','$jobTitle','$pay','$startDate','$endDate','$weekHours','$location','$positions','$internshipId','$supervisorId','$businessId',@pout)";
			
			$query = $connection->prepare($query);
			$query->execute();
					
			$result=$connection->query("select @pout")->fetch();
			Database::disconnect();
			return($result[0]);
		}
			
	// Placements
		
	public static function fetchStudentPlacements($studentId) {
			$connection = Database::connect();
				
			$query = "select io.internship_id, io.pay, io.location, job_description, job_title, business_name, io.start_date isdt, io.end_date iedt, p.start_date psdt, p.end_date pedt,p.student_eval, p.supervisor_eval ".
					"from (placement p join internship_opportunities io using(internship_id)) natural join business where student_id = '$studentId'";
			$placements = array();
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			
				
			if($result) {
			while($row = $statement->fetchObject()) {
			$plcmnt = new Placement();
			$plcmnt->setBusinessName($row->business_name);
			$plcmnt->setInternshipEndDate($row->iedt);
			$plcmnt->setInternshipStartDate($row->isdt);
			$plcmnt->setJobDescription($row->job_description);
			$plcmnt->setJobTitle($row->job_title);
			$plcmnt->setPlacementEndDate($row->pedt);
			$plcmnt->setPlacementStartDate($row->psdt);
			$plcmnt->setId($row->internship_id);
			$plcmnt->setPay($row->pay);
			$plcmnt->setLocation($row->location);
			$plcmnt->setStudentEval($row->student_eval);
			$plcmnt->setSupervisorEval($row->supervisor_eval);
			$placements[] = $plcmnt;
			}
			}
			Database::disconnect();
			return ($placements);
			}
		
			
			public static function fetchAllPlacements() {
				$connection = Database::connect();
			
				$query = "select io.internship_id, io.pay, u.user_id, io.location, job_description, job_title, business_name, "
						. "p.student_id, concat(u.fname , ' ', u.lname) as name, io.start_date isdt, io.end_date iedt, p.start_date psdt, "
						. "p.end_date pedt,p.student_eval, p.supervisor_eval from "
						. "((placement p join internship_opportunities io using(internship_id)) natural join business) "
						. " join user u where u.user_id = p.student_id";
				$placements = array();
				$statement = $connection->prepare($query);
				$result = $statement->execute();
					
				if($result) {
					while($row = $statement->fetchObject()) {
						$plcmnt = new Placement();
						$plcmnt->setBusinessName($row->business_name);
						$plcmnt->setInternshipEndDate($row->iedt);
						$plcmnt->setInternshipStartDate($row->isdt);
						$plcmnt->setJobDescription($row->job_description);
						$plcmnt->setJobTitle($row->job_title);
						$plcmnt->setPlacementEndDate($row->pedt);
						$plcmnt->setPlacementStartDate($row->psdt);
						$plcmnt->setId($row->internship_id);
						$plcmnt->setPay($row->pay);
						$plcmnt->setLocation($row->location);
						$plcmnt->setStudentEval($row->student_eval);
						$plcmnt->setSupervisorEval($row->supervisor_eval);
						$plcmnt->setName($row->name);
						$plcmnt->setStudentId($row->user_id);
						$placements[] = $plcmnt;
					}
				}
				Database::disconnect();
				return ($placements);
			}	
			
		public static function fetchPlacementForStudent($studentId, $placementList) {
			$connection = Database::connect();
			$query = "select internship_id, student_eval, supervisor_eval from placement where student_id = '$studentId'";
				
			$statement = $connection->prepare($query);
			$result = $statement->execute();
				
			if($result) {
				while($row = $statement->fetchObject()) {
					$internshipId = $row->internship_id;
					$studentEval = $row->student_eval;
					$supervisorEval = $row->supervisor_eval;
					for($i = 0; $i < count($placementList); $i++) {
						if($placementList[$i]->getId() === $internshipId) {
							$placementList[$i]->setStudentEval($studentEval);
							$placementList[$i]->setSupervisorEval($supervisorEval);
							break;
						}
					}						
				}
			}
			Database::disconnect();
			return($placementList);
		}		
		
		/*public static function insertIntoPlacements($studentId, $internshipId, $flag) {
			$connection = Database::connect();
			$studentEval = "N";
			if($flag == "studentEval") {
				$query = "insert into placement (student_id, internship_id, student_eval) values ('$studentId', '$internshipId', '$studentEval')";
				$query = $connection->prepare($query);
				$query->execute();
			} else {
				$studentEval = self::doesExist1($studentId, $internshipId);
				if($studentEval) {
					$query = "update placement set student_eval = 'Y' where student_id = $studentId and internship_id = $internshipId";
				} else {
					$query = "insert into placement (student_id, internship_id, student_eval) values ('$studentId', '$internshipId', 'Y')";
				}
				$query = $connection->prepare($query);
				$query->execute();
			}
			Database::disconnect();
		}*/
		
		public static function insertIntoPlacements($studentId, $internshipId, $flag) {
			$connection = Database::connect();
			//$studentEval = "N";
			//$supervisorEval = "N";
			if($flag == "studentEval") {
				$studentEval = self::doesExist1($studentId, $internshipId);
				if($studentEval) {
					$query = "update placement set student_eval = 'Y' where student_id = $studentId and internship_id = $internshipId";
				} else {
					$query = "insert into placement (student_id, internship_id, student_eval) values ('$studentId', '$internshipId', 'Y')";
				}
				
				$query = $connection->prepare($query);
				$query->execute();
			} else {
				$supervisorEval = self::doesExist2($studentId, $internshipId);
				$query = "update placement set supervisor_eval = 'Y' where student_id = $studentId and internship_id = $internshipId";				
				$query = $connection->prepare($query);
				$query->execute();
			}
			Database::disconnect();
		}
		
		public static function doesExist1($studentId, $internshipId) {
			$connection = Database::connect();
			$query = "select student_eval from placement where student_id = '$studentId' and internship_id = '$internshipId'";
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			$studentEval = false;
				
			if($result) {
				while($row = $statement->fetchObject()) {
					$studentEval = true;
					break;
				}
			}
			return $studentEval;
		}
		
		public static function doesExist2($studentId, $internshipId) {
			$connection = Database::connect();
			$query = "select supervisor_eval from placement where student_id = '$studentId' and internship_id = '$internshipId'";
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			$supervisorEval = false;
		
			if($result) {
				while($row = $statement->fetchObject()) {
					$supervisorEval = true;
					break;
				}
			}
			return $supervisorEval;
		}
		
		//supervisor
		
		public static function getSupervisorsList(){
			$connection = Database::connect();
			$query = "select u.user_id as user_id, fname,lname,email_id,business_name, b.business_id from user u,supervisor s,business b where b.business_id=s.business_id and u.user_id=s.user_id and user_type='B'";
			
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			$supervisorList=array();
			if($result) {
				while($row = $statement->fetchObject()) {
					$io=new Supervisor();
					$io->setUserId($row->user_id);
					$io->setLname($row->lname);
					$io->setFname($row->fname);
					$io->setEmailId($row->email_id);
					$io->setBusinessName($row->business_name);
					$io->setBusinessId($row->business_id);
					$supervisorList[]=$io;
				}
			}
			Database::disconnect();
			return($supervisorList);
		
		}
		
		public static function getSkillsMultiSelect(){
		
			$outputString ="";
			$query = "select skill_id,skill_name from skills";
			$connection = Database::connect();
			$statement = $connection->prepare($query);
			$result=$statement->execute();
			if($result){
				$outputString= "<select name=\"skills[]\" multiple=\"multiple\" >";
				
				while($row=$statement->fetchObject()){
		
					$outputString.= "<option value=".$row->skill_id.">".$row->skill_name."</option>";
		
				}
				$outputString.="</select>";
		
				return $outputString;
			}
		}
	public static function getSkillsForInternship($internship_id){
		
			$outputString ="";
			$query = "select skill_id from qualification where internship_id = '$internship_id'";
			$connection = Database::connect();
			$selectedValues =array();
			$statement = $connection->prepare($query);
			$result1=$statement->execute();
			if($result1){
				while($row=$statement->fetchObject()){
					$selectedValues[]=$row->skill_id;
				}
			}
			
			$query = "select skill_id,skill_name from skills";
			$statement = $connection->prepare($query);
			$result=$statement->execute();
			if($result){
				$outputString= "<select name=\"skills[]\" multiple=\"multiple\" >";
				
				while($row=$statement->fetchObject()){
				if(in_array($row->skill_id, $selectedValues)){
					$outputString.= "<option selected=\"true\" value=".$row->skill_id.">".$row->skill_name."</option>";
		}
		else{
			$outputString.= "<option value=".$row->skill_id.">".$row->skill_name."</option>";
		}
				}
				$outputString.="</select>";
				
		
			}
			Database::disconnect();
			return $outputString;
				
	}
		
	
	public static function updateSkills($skillarray, $id){
		
		$query = "delete from qualification where internship_id='$id'";
		$connection = Database::connect();
		$statement = $connection->prepare($query);
		$result=$statement->execute();
		foreach($_POST['skills'] as $option){
			
		$query = "insert into qualification (skill_id,dept_id,internship_id)values('$option',6000,'$id')";
		
		$statement = $connection->prepare($query);
		$result=$statement->execute();
		
		}
		Database::disconnect();
	}
	}
?>