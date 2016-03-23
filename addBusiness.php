<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>NewBusiness</title>

  <link rel="stylesheet" href="style/reset.css">

  <link rel="stylesheet" href="style/style.css">

</head>

<body>		
 <br>
 
 <div class="wrap">
	<center><h1 class="niner">NINERSHIP</h1></center>
	<br>
		<div class="avatar">
			<img src="image/logo.png">
		</div>
		<form role="form"action="addBusiness.php" method="post">
		<input type="text" name="businessName" id="businessName" placeholder="businessName" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="text" name="address" id="address" placeholder="address" required>
		<div class="bar">
			<i></i>
		</div>
		
		<input type="text" name="city" id="city" placeholder="city" required>
		<div class="bar">
			<i></i>
		</div>
		
		<input type="text" name="state" id="state" placeholder="state" required>
		<div class="bar">
			<i></i>
		</div>
		
		<input type="text" name="zipcode" id="zipcode" placeholder="zipcode" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="text" name="phone" id="phone" placeholder="phone" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="email" name="mail" id="mail" placeholder="mail" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="text" name="profile" id="profile" placeholder="profile" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="text" name="type" id="type" placeholder="type" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="text" name="website" id="website" placeholder="website" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="text" name="industry" id="industry" placeholder="industry" required>
		<div class="bar">
			<i></i>
		</div>
		<br>
		<button>ADD</button>
		</form>
	</div>
</body>
</html>
<?php
include 'model/BusinessModel.php';
require_once 'buisnessObject.php';

if(isset($_POST["mail"]))
{
	$newBus = new businessObject();
	
	$newBus->setName($_POST['businessName']);
	$newBus->setAddress($_POST['address']);
	$newBus->setCity($_POST['city']);
	$newBus->setState($_POST['state']);
	$newBus->setEmail($_POST['mail']);
	$newBus->getIndustry($_POST['industry']);
	$newBus->setWebsite($_POST['website']);
	$newBus->setType($_POST['type']);
	if(BusinessModel::addBusiness($newBus)==true){
		header("Location: newBusiness.php");
	}
}
?>