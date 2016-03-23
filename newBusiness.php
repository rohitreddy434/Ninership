
<?php 
include 'model/BusinessModel.php';
require('headerAdmin.php');
//include 'model/BusinessModel.php';
//include 'buisnessObject.php';
if(isset($_GET['id'])){
	echo "inside get ID";
	BusinessModel::deleteBusiness($_GET['id']);
	echo "inside get ID after";
}

//$_SESSION["studentId"] = 6;
//$studentId = $_SESSION["studentId"];
$business = BusinessModel::getAllBusiness();
?>
<html>

<head>

  <meta charset="UTF-8">

  <title>Business</title>

  <link rel="stylesheet" href="style/reset_profile.css">

  <link rel="stylesheet" href="style/internships.css">
  <script type="text/javascript">
 // alert('here');
function clickedDelete(id)
{
	//alert('here'+id);
	document.forms[0].id.value=id;
	document.forms[0].action="newBusiness.php";
	document.forms[0].submit();
}
function clickedAdd()
{
	//alert('here'+id);
	//document.forms[0].id.value=id;
	document.forms[0].action="addBusiness.php";
	document.forms[0].submit();
}

	</script> 
</head>


<body>
  <br>
  	
  <div> 	
  	<form class="form1" action="#" method = "GET" >
 		<input type="hidden" id="id" name="id">
 			<center><h1>BUSINESS DETAILS</h1></center>
			<br>
			<div class="bar">
			<i></i>
			<center><td class='td3'><input type='button' class='button' value='ADD NEW' onclick='clickedAdd()' /></td></center>
		</div>
		<br>
		<br>
		<div>
		<form>
			<table>
				<tr>
					<?php 
				for($i = 0; $i < count($business); $i++) {
					echo "<tr>";
					echo "<td class='td1'>".$business[$i]->getName()."</td>";
					echo "<td class='td2'>".$business[$i]->getAddress()."</td>";
					//echo "<td class='td3'><input type='button' class='button' value='Details' /></td>";
					$businessId = $business[$i]->getId();
					echo "<td class='td3'><input type='button' class='button' value='Delete' onclick='clickedDelete($businessId);'></td>";
					echo"</tr>";
					echo "<tr>";
					echo "<td>".$business[$i]->getWebsite()."</td>";
					echo "<td>".$business[$i]->getEmail()."</td>";
					echo "<td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>".$business[$i]->getType()."</td>";
					echo "<td></td>";
					echo "<td>";
					echo "</tr>";
					echo "<tr>
						<td>&nbsp;</td>
						<td></td><td></td></tr>";
	
				}
				?>
				
			</table>
		</form>	
		</div>	
  </div>  
</body>

</html>