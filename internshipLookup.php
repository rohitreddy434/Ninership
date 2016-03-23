<?php
	include 'InternshipOpportunitiesDAO.php';
	session_start();
	$internships = InternshipOppotunitiesDAO::fetchAllInternships();
?>

<html>

<head>

  	<title>profileStudent</title>
  	<link rel="stylesheet" href="style/reset_profile.css">
	<link rel="stylesheet" href="style/internships.css">
  
  <script type="text/javascript">
	function sendValue(value) {
		var valueArr = value.name.split(":");
		window.opener.document.getElementById('internIdHidden').value = valueArr[1];
		window.opener.document.getElementById('InternshipId').value = valueArr[0];
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
   			if(count($internships) > 0) {
   			?>
   			<table>
   			<?php
   				$counter = 0; 
   				foreach($internships as $in) {
   					$btn = $in->getJobTitle() . ", ". $in->getBusinessName(). ":".$in->getId();
   					//$btn = $in->getId();
   				?>
   				<tr>
   					<td><?php echo $in->getJobDesc(); ?></td>
   					<td><?php echo $in->getBusinessName(); ?></td> 
   					<td><?php echo $in->getStartDate(); ?></td>
   					<td><?php echo $in->getEndDate(); ?></td>
   						
   					<td> <input type="button" class="button" name="<?php echo $btn;?>" value="Select" onclick="sendValue(this)"/> </td>
   				</tr>
   				<tr>
   					<td> </td>
   					<td> </td>
   					<td> </td>
   					<td </td>
   				</tr>
   			<?php }
   			?> </table> <?php 
   			} else {
   			?>
   			<label>Sorry no internships exists!</label>
   			<?php }?>
   	 </div>  
</body>
</html>