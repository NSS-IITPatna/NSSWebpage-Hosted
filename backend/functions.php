<?php
	include("utility.php");

/*******************Useful Functions*****************/

//Cleans the string from unwanted html symbols
function clean($string){
	return htmlentities($string);
}

//Redirect to a particular page after task is done
function redirect($location){
	return header("Location: {$location}");
}

//Function to store message
function set_message($message){
	if(!empty($message)){
		$_SESSION['message']=$message;
	}
	else{
		$message="";
	}
}

//DISPLAY MESSAGE
function display_message(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

//Function to display validation error
function validation_errors($error_message){
$error = <<<DELIMITER
<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button><strong>Warning!</strong> $$error_message
			</div>
DELIMITER;
return $error;
}

//To check if the given email address already exists or not
function email_exists($email){
	$sql="SELECT id FROM users WHERE email='$email'";
	$result=query($sql);
	if(row_count($result)==1){
		return true;
	}else{
		return false;
	}
}

function rollno_exists($rollno){
	$sql="SELECT id FROM users WHERE rollno='$rollno'";
	$result=query($sql);
	if(row_count($result)==1){
		return true;
	}else{
		return false;
	}
}

function validate_user_registration(){
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$errors=[];

		$name=escape(clean($_POST['name']));
 		$phone=escape(clean($_POST['phone']));
 		$unit=escape(clean($_POST['unit']));
 		$email=escape(clean($_POST['email']));
 		$password=escape(clean($_POST['password']));
 		$confirm_password=escape(clean($_POST['confirm_password']));
		$rollno=escape(clean($_POST['rollno']));

		if(empty($name)){
			$errors[]="Name field cannot be empty.";
		}

		if(empty($phone)){
			$errors[]="Phone field cannot be empty.";
		}
		if(empty($unit)){
			$errors[]="Unit field cannot be empty.";
		}
		if(empty($email)){
			$errors[]="Email field cannot be empty.";
		}
		if(empty($password)){
			$errors[]="Password field cannot be empty.";
		}
		if(empty($rollno)){
			$errors[]="Roll No field cannot be empty.";
		}
		if($password !== $confirm_password){
			$errors[]="Password fields didn't match.";
		}
		if(strlen($rollno)!=8){
			$errors[]="Enter valid rollno.";
		}
		if(rollno_exists($rollno)){
			$errors[]="The rollno you are trying to register has already been registered.";
		}
		if(email_exists($email)){
			$errors[]="The email you are trying to register has already been registered.";
		}
		if(strpos($email,"iitp.ac.in")===false){
			$errors[]="Please enter your official IITP email address.";
		}

		if(!empty($errors)){
	 		foreach($errors as $error){
	 			echo validation_errors($error);
	 		}
	 		return json_encode(array_merge(array("401"),$errors));
	 	}else{
			$password=sha1($password);

			$subject="Registered for NSS Attendance portal";
			$msg="
				<p> $name you have successfully registered for NSS attendance portal. Please wait until your account is activated by the core body.</p>
				<h3>Thank You</h3>
				<h4>With Regards</h4>
				<h4>Team NSS</h4>
			";
			$header="From: nss@iitp.ac.in";

			if(send_email($email,$subject,$msg,$header)){
				$sql = "INSERT INTO users(name, phone, email, password, unit, rollno, active) VALUES('$name','$phone','$email','$password','$unit','$rollno',0)";
				$result=query($sql);
				confirm($result);
				set_message("<p class='bg-success text-center'>$name you have successfully registered your account. You can check your attendance after your account is activated by the core team.</p>");
				return json_encode("200");
			}
		 }

	}
}
