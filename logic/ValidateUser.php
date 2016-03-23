<?php 
	include '../database.php';
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		echo "username";
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "CALL validate_user('$username','$password',@po_is_valid_user,@po_user_type,@po_user_id)";
		$connection = Database::connect();
		$statement = $connection->prepare($query);
		$statement->execute();
		$result=$connection->query("select @po_is_valid_user,@po_user_type,@po_user_id")->fetch(PDO::FETCH_ASSOC);
		//echo $result;
		echo $result['@po_is_valid_user'];
		if($result && $result['@po_is_valid_user']) {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['userType'] = $result['@po_user_type'];
			$_SESSION['userId'] = $result['@po_user_id'];
			if($result['@po_user_type'] === 'A'){
				header("location: ../homeAdmin.php");
			}				
			else if($result['@po_user_type'] === 'S'){
				header("location: ../StudentDetails.php");
			}				
		} else{
			header("location: ../index.php?reason=invalid");			
		}
	}
?>