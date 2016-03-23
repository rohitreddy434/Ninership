<?php
 class Supervisor{
private $fname;
private $lname;
private $businessName;
private $emailId;
private $userId;
private $businessId;


public function setBusinessId($businessId){
	$this->businessId=$businessId;
}
public function getBusinessId(){
	return ($this->businessId);
}

public function getUserId(){
	return ($this->userId);
}
public function setUserId($userId){
	$this->userId=$userId;
}

public function getFname(){
	return ($this->fname);
}
public function setFname($fname){
$this->fname=$fname;
}

public function getLname(){
	return ($this->lname);
	
}


public function setLname($lname){
	$this->lname=$lname;
}

public function setEmailId($emailId){
	$this->emailId=$emailId;
}
public function getEmailId(){
	return ($this->emailId);
}
public function setBusinessName($businessName){
	$this->businessName=$businessName;
}
public function getBusinessName(){
	return ($this->businessName);
}


}
?>