<?php
	require 'headerAdmin.php';
	include 'InternshipOpportunitiesDAO.php';
    	
	if (isset($_POST['submit'])){
	    	    	
    	$studentId = $_POST['studentId'];
    	$InternshipId = $_POST['internIdHidden'];
    	$startdate = $_POST['startdate'];
    	$enddate = $_POST['enddate'];
    	$superVisorEval = $_POST['superVisorEval'];
    	$studentEval = $_POST['studentEval'];

    	if ($studentEval == 'on'){
    		$studentEval = 'Y';
    	}else {
    		$studentEval = 'N';
    	}
    	if ($superVisorEval == 'on'){
    		$superVisorEval = 'Y';
    	} else{
    		$superVisorEval = 'N';
    	}   		
    	
    	try{
    	$connection = Database::connect();
    	
    	// prepare a statement and execute it by
    	// calling the stored procedure
    	printf($studentId);
    	printf($InternshipId);
    	printf($startdate);
    	printf($enddate);
    	printf($superVisorEval);
    	printf($studentEval);
    	
    	$stmt = $connection->prepare("CALL AddPlacement(:1, :2, :3, :4, :5 ,:6, @output)");
    	
    	// One bindParam() call per parameter
    	//$stmt->bindParam(1, $username, PDO::PARAM_STR);
    	$stmt->bindParam(':1', $studentId, PDO::PARAM_STR);
    	$stmt->bindParam(':2', $InternshipId, PDO::PARAM_STR);
    	$stmt->bindParam(':3', $startdate, PDO::PARAM_STR);
    	$stmt->bindParam(':4', $enddate, PDO::PARAM_STR);
    	$stmt->bindParam(':5', $studentEval, PDO::PARAM_STR);
    	$stmt->bindParam(':6', $superVisorEval, PDO::PARAM_STR);
    	 
    	$stmt->execute();
    	$stmt->closeCursor();
    	
    	$select = $connection->query("SELECT @output as output")->fetch(PDO::FETCH_ASSOC);
    	} catch (PDOException $pe) {
    		die("Error occurred:" . $pe->getMessage());
    	}
    	
    	print_r($select);
    	echo $select;
    	echo '<pre>'.$resultset.'</pre>';
    	    	
    	
       
        if($select){
            $msg = "User Created Successfully";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            //session_start();
            //$_SESSION['login'] = "1";            
            header("Location: studentPlacement.php");            
		} else
        {   
        	$error = "Invalid Credentials.Please register again";
        	echo "<script type='text/javascript'>alert('$error');</script>";
        	header("Location: register.php");
        }
    }
?>
<html>
	<head>
		 <link rel="stylesheet" href="style/formstyle.css">
	</head>

<body>
	<br>
	<form class="smart-green" action="AddPlacementNew.php" method="POST">
			<?php
				//session_start();	
				$msg;
			
				if(isset($_SESSION['message'])) {
					$msg = $_SESSION['message'];	
				}
				if(isset($msg) & !empty($msg)){
			?> <br> <div style="text-align: center">
				<label class="error"> <?php echo $msg; ?> </label> </div> <br><br>
				<?php 
			}	
 			?>
 			<br>
				<input type="hidden" id="internIdHidden" name="internIdHidden" />
				<label>
					<span> Student Id</span>
					<input id = "studentId" type="email" name="studentId" placeholder="Student mail Id" autofocus required>
				</label>
				
				<label>
					<span>Internship</span>
					<input id = "InternshipId" type="text" name="InternshipId" placeholder="Internship Opportunity" required onclick="test()">
				</label>
				
				<label>
					<span>Start date</span>
					<input id = "startdate" type="text" name="startdate" placeholder="yyyy-mm-dd" required>
				</label>
				<label>
					<span>End date</span>
					<input id = "enddate" type="text" name = "enddate"  placeholder="yyyy-mm-dd" >
				</label>
				<label>
					<span>Supervisor Evaluation</span>
					<input id = "superVisorEval" type="checkbox" name="superVisorEval">
				</label>
				
				<label>
					<span> Student Evaluation</span>
					<input id = "studentEval" type="checkbox" name="studentEval">
				</label>
				
				<label>
					<input id="submit" class="button" type="submit" name="submit" value="Add"/>
				</label>
				<br><br><br>
		</form>
	</div>		 		
</body>
<script type="text/javascript">
function test() {
	window.open('internshipLookup.php','popup_form','width=800 height=800 left=500 top=100');
}
</script>	
<!--

//-->
</script>
</html>