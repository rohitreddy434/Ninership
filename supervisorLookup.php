<?php
	include 'InternshipOpportunitiesDAO.php';
	session_start();
	$supervisors = InternshipOppotunitiesDAO::getSupervisorsList();
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <title>profileStudent</title>
  <link rel="stylesheet" href="style/reset_profile.css">

<link rel="stylesheet" href="style/internships.css">

  <script type="text/javascript">
	function sendValue(value) {
		var valueArr = value.name.split(":");
		
		window.opener.document.getElementById('supervisorId').value = valueArr[0];
		window.opener.document.getElementById('supervisorName').value = valueArr[1];
		window.opener.document.getElementById('businessId').value = valueArr[2];
		window.close();
		}
</script>
  
</head>

<body>
  <br>
  <div class="avatar">
	<img class="img1" src="image/logo.png">
	<center><h1 class="niner">NINERSHIP</h1></center>
  </div>
  <div>
  		<?php 
   			if(count($supervisors) > 0) {
   			?>
   			<table>
   				
   			<?php
   				$counter = 0; 
   				foreach($supervisors as $in) {
   					//$btn1 = $in->getJobTitle() . ", ". $in->getBusinessName(). ":".$in->getId();
   					$btn = $in->getUserId().':'.$in->getFname().' '.$in->getLname().':'.$in->getBusinessId();
   				?>
   				<tr>
   					<td class="td1"> <?php echo $in->getFname(). " " . $in->getLname(); ?> </td>
   					<td> <?php echo $in->getEmailId(); ?> </td>
   					<td> <?php echo $in->getBusinessName(); ?> </th>
   					<td> <input type="button" name="<?php echo $btn;?>" value="Select" onclick="sendValue(this)"/> </td>
   				</tr>
   			<?php }
   			?> </table> <?php 
   			} else {
   			?>
   			<label>Sorry no supervisors exists!</label>
   			<?php } ?>
   	 </div>
</body>
</html>