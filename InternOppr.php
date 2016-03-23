<?php
	require 'Skills.php';
			
	class InternOppr {
		private $id;
		private $jobDesc;
		private $jobTitle;
		private $businessName;
		private $pay;
		private $startDate;
		private $endDate;
		private $weeklyHrsRequired;
		private $location;
		private $postDate;
		private $noOfPos;
		private $interested;
		private $applied;
		private $skillsList;
		private $supervisorId;
		private $supervisorLname;
		private $supervisorFname;
		private $businessId;
		
		
		public function setBusinessId($businessId){
			$this->businessId=$businessId;
		}
		public function getBusinessId(){
			return ($this->businessId);
		}
		
		public function getSupervisorFname(){
			return ($this->supervisorFname);
		}
		public function setSupervisorFname($fname){
			$this->supervisorFname=$fname;
		}
		
		public function getSupervisorLname(){
			return ($this->supervisorLname);
		
		}
		
		
		public function setSupervisorLname($lname){
			$this->supervisorLname=$lname;
		}
		
		
		public function setId($id) {
			$this->id = $id;
		}
		
		public function getId() {
			return ($this->id);
		}
		
		public function setJobDesc($jobDesc) {
			$this->jobDesc = $jobDesc;
		}
		
		public function getJobDesc() {
			return ($this->jobDesc);
		}
		
		public function setJobTitle($jobTitle) {
			$this->jobTitle = $jobTitle;
		}
		
		public function getJobTitle() {
			return ($this->jobTitle);
		}
		
		public function setBusinessName($business) {
			$this->businessName = $business;
		}
		
		public function getBusinessName() {
			return ($this->businessName);
		}
		
		public function setPay($pay) {
			$this->pay = $pay;
		}
		
		public function getPay() {
			return($this->pay);
		}
		
		public function setStartDate($startDate) {
			$this->startDate = $startDate;
		}
		
		public function getStartDate() {
			return($this->startDate);
		}
		
		public function setEndDate($endDate) {
			$this->endDate = $endDate;
		}
		
		public function getEndDate() {
			return ($this->endDate);
		}
		
		public function setWeeklyHrsRequired($weeklyHrsRequired) {
			$this->weeklyHrsRequired = $weeklyHrsRequired;
		} 
		
		public function getWeeklyHrsRequired() {
			return($this->weeklyHrsRequired);
		}
		
		public function setLocation($location) {
			$this->location = $location;
		}
		
		public function getLocation() {
			return($this->location);
		}
		
		public function setPostDate($postDate) {
			$this->postDate = $postDate;
		}
		public function getPostDate() {
			return ($this->postDate);
		}
		
		public function setNoOfPositions($noOfPositions) {
			$this->noOfPos = $noOfPositions;
		}
		
		public function getNoOfPositions() {
			return ($this->noOfPos);
		}
		
		public function setInterested($interested) {
			$this->interested = $interested;
		}
		
		public function getInterested() {
			return($this->interested);
		}
		
		public function setApplied($applied) {
			$this->applied = $applied;
		}
		
		public function getApplied() {
			return($this->applied);
		}
		
		public function setSkillsList($skillList) {
			$this->skillsList = $skillList;
		}
		public function getSkillsList() {
			return($this->skillsList);
		}

		public function setSupervisorId($supervisorId) {
			$this->supervisorId = $supervisorId;
		}
		
		public function getSupervisorId() {
			return ($this->supervisorId);
		}
		
	public function getSkillDescriptions() {
			$skillDesc = "";
			$prevSkill = "";
			
			for($i = 0, $flag = 0; $i < count($this->skillsList); $i++) {
				$skill = $this->skillsList[$i];
				/* echo "prevSkill: " . $prevSkill . " " . strlen($prevSkill) . "<br>";
				echo "currentSkill:" . $skill->getSkillName() . " " . strlen($skill->getSkillName()) . "<br>";
				 */
				if(empty($skill->getSkillName()))
					continue;
				if(!empty($prevSkill)) {
					if($prevSkill == $skill->getSkillName())
						continue;
				}
				
				if((!empty($prevSkill)) && ($prevSkill == $skill->getSkillName()))
					continue;
				if(!$flag) {
					$skillDesc = $skill->getSkillName();
					$flag = 1;
				} else {
					$skillDesc = $skillDesc . ", " . $skill->getSkillName();
				}
				
				$prevSkill = $skill->getSkillName();
				//echo "$$$$$$$$$$$$4 <br>";
			}
			if(empty($skillDesc)) {
				$skillDesc = "NA";
			}
			return $skillDesc;
		}
	}

?>