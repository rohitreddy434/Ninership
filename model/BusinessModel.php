
<?php
include 'database.php';
include 'buisnessObject.php';
class BusinessModel{
	
		public static function getAllBusiness(){
		$stringPrint = "";
		$businessArray = array();
		$database = Database::connect();
		$sql = "select * from `business`;";
		$query = $database->prepare($sql);
		$query->execute();
		$foundnum = $query->rowCount();
		if($foundnum > 0){
			while($foundnum >0){
				$foundnum = $foundnum -1;
				foreach ($query as $row){
					if($row['isdelete']=="N"){
				$newbusiness = new businessObject();
				$newbusiness->setName($row['business_name']);
				$newbusiness->setId($row['business_id']);
				$newbusiness->setAddress($row['address']);
				$newbusiness->setCity($row['city']);
				$newbusiness->setState($row['state']);
				$newbusiness->setEmail($row['contact_email']);
				$newbusiness->setWebsite($row['website']);
				$newbusiness->setType($row['business_type']);
				$newbusiness->setIndustry($row['industry']);
					
				$businessArray[]=$newbusiness;
					}
				}
			
			}
		}
				
		Database::disconnect();
		return $businessArray;
	}
	
	public static function addBusiness(businessObject $businessObject){
		
		$bsName=$businessObject->getName();
		$bsadress=$businessObject->getAddress();
		$bsCity=$businessObject->getCity();
		$bsState=$businessObject->getState();
		$bsZipcode="";
		$bsPhone="";
		$bsEmail=$businessObject->getEmail();
		$bsProfile="";
		$bsWebsite=$businessObject->getWebsite();
		$bsType=$businessObject->getType();
		$bsIndustry=$businessObject->getIndustry();
		$database = Database::connect();
		$sql = "INSERT INTO `business`(`business_name`, `address`, `city`, `state`, `zipcode`, `contact_phone`, `contact_email`, `business_profile`, `website`, `business_type`, `industry`) VALUES ('$bsName','$bsadress','$bsCity','$bsState','$bsZipcode','$bsPhone','$bsEmail','$bsProfile','$bsWebsite','$bsType','$bsIndustry')";
		echo $sql;
		$query = $database->prepare($sql);
		$query->execute();
		Database::disconnect();
		return true;
	}
	
	public static function deleteBusiness($bsId){
		printf($bsId);
		$database = Database::connect();
		//$sql = "DELETE FROM `business` WHERE business_id ='$bsId'";
		$sql= "UPDATE `business` SET `isdelete`='Y'WHERE `business_id`='$bsId'";
		echo "Inside delereBusiness". $sql;
		$query = $database->prepare($sql);
		$query->execute();
		Database::disconnect();
	}
	
	public static function editBusiness($bsId,$bsName,$bsadress,$bsCity,$bsState,$bsZipcode,$bsPhone,$bsEmail,$bsProfile,$bsWebsite,$bsType,$bsIndustry){
		$database = Database::connect();
		$sql="Update table business set business_name='$bsName',adress = '$bsadress',city='$bsCity',state='$bsState',zipcode='$bsZipcode',contact_phone='$bsPhone',contact_email='$bsEmail',business_profile='$bsProfile',website='$bsWebsite',busines_type='$bsType',industry='$bsIndustry' where business_id='$bsId';";
		$query = $database->prepare($sql);
		$query->execute();
		Database::disconnect();
			
	}
	public static function getBusinessById($bsId){
		$newbusiness = new businessObject();
		$database = Database::connect();
		$sql = "select * from `business` where business_id='$bsId';";
		$query = $database->prepare($sql);
		$query->execute();
		$foundnum = $query->rowCount();
		if($foundnum > 0){
			$newbusiness->setName($query['business_name']);
			$newbusiness->setId($query['business_id']);
			$newbusiness->setAddress($query['address']);
			$newbusiness->setCity($query['city']);
			$newbusiness->setState($query['state']);
			$newbusiness->setEmail($query['contact_email']);
			$newbusiness->setWebsite($query['website']);
			$newbusiness->setType($query['business_type']);
			$newbusiness->setIndustry($query['industry']);
			}
			return $newbusiness;
		}
		
	
}

?>

   