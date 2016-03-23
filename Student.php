<?php
	include 'Skills.php';

	class Student {
		private $name;
		private $id;
		private $address;
		private $city;
		private $state;
		private $zipcode;
		private $phoneNo;
		private $emailId;
		private $skills;
		
		public function getName() {
			return ($this->name);
		}
		public function setName($name) {
			$this->name = $name;
		}
		public function getId() {
			return ($this->id);
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getAddress() {
			return ($this->address);
		}
		public function setAddress($address) {
			$this->address = $address;
		}
		public function getCity() {
			return ($this->city);
		}
		public function setCity($city) {
			$this->city = $city;
		}
		public function getState() {
			return ($this->state);
		}
		public function setState($state) {
			$this->state = $state;
		}
		public function getZipcode() {
			return ($this->zipcode);
		}
		public function setZipcode($zipcode) {
			$this->zipcode = $zipcode;
		}
		public function getPhoneNo() {
			return ($this->phoneNo);
		}
		public function setPhoneNo($phoneNo) {
			$this->phoneNo = $phoneNo;
		}
		public function getEmailId() {
			return ($this->emailId);
		}
		public function setEmailId($emailId) {
			$this->emailId = $emailId;
		}
		public function getSkills() {
			return ($this->skills);
		}
		public function setSkills($skills) {
			$this->skills = $skills;
		}
		
		public function getSkillDescriptions() {
			$skillDesc = "";
			$flag = false;
			$skillLevel = "";
			for($i = 0; $i < count($this->skills); $i++) {
				$skill = $this->skills[$i];
				if($skill->getLevel() == "I")
					$skillLevel = "Intermediate";
				else if($skill->getLevel() == "N")
					$skillLevel = "Novice";
				else
					$skillLevel = "Expert";
				if($i == 0) {
					$skillDesc = $skillLevel . " in " . $skill->getSkillName() ;
					$flag = true;
				} else {
					$skillDesc = $skillDesc . "\n" . $skillLevel . " in " . $skill->getSkillName();
				}
			}
			return $skillDesc;
		}
	}
?>