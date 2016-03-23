<?php

Class Skills {
	private $skillId;
	private $skillName;
	private $level;
	
	public function getSkillId() {
		return  ($this->skillId);
	}
	public function setSkillId($skillId) {
		$this->skillId = $skillId;
	}
	
	public function getSkillName() {
		return($this->skillName);
	}
	
	public function setSkillName($skillName) {
		$this->skillName = $skillName;
	}
	
	public function getLevel() {
		return($this->level);
	}
	
	public function setLevel($level) {
		$this->level = $level;
	}
	
}
