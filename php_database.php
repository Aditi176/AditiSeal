<?php
	
	// _POST[] means accessing the attributes from the post method in the form tag.
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$message = $_POST['message'];

	// php database connection
	$con = new mysqli('localhost','root','','save_data');
	if ($con->connect_error) {
		die('connection failed : '.$con->connect_error);
	}
	else
	{
		$stmt = $con->prepare("insert into form_data(name, email, mobile, message) values(?, ?, ? ,?)");
		$stmt->bind_param("ssis",$name, $email, $mobile, $message);
		$stmt->execute();
		echo "<script> 
				alert('Message Sent!');
				window.location= 'contact.html';
			  </script>";
		$stmt->close();
		$con->close();
	}

?>