<?php
class businessObject{
	private $Business_ID;
	private $Business_Name;
	private $Address;
	private $City;
	private $State;
	private $Email;
	private $Website;
	private $Type;
	private $Industry;
	
	public function setId($id){
		$this->Business_ID = $id;
	}
	public function getId(){
		return ($this->Business_ID);
	}
	public function getName(){
		return ($this->Business_Name);
	}
	public function setName($name){
		$this->Business_Name = $name;
	}
	public function getAddress(){
		return ($this->Address);
	} 
	public function setAddress($address){
		$this->Address=$address;
	}
	public function getCity(){
		return ($this->Address);
	}
	public function setCity($City){
		$this->City=$City;
	}
	public function getState(){
		return $this->State;
	}
	public function setState($state){
		$this->State=$state;
	}
	public function getEmail(){
		return $this->Email;
	}
	public function setEmail($email){
		$this->Email=$email;
	}
	public function getWebsite(){
		return $this->Website;
	}
	public function setWebsite($website){
		$this->Website=$website;
	}
	public function getType(){
		return $this->Type;
	}
	public function setType($type){
		$this->Type=$type;
	}
	public function getIndustry(){
		return $this->Industry;
	}
	public function setIndustry($industry){
		$this->Industry=$industry;
	}
}
?>