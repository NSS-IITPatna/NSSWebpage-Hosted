<?php

include("utility.php");
// include("attendance.php");
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

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
  <div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> $error_message
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
				redirect("login.php");
				return json_encode("200");
			} else {
				echo validation_errors("Error occurred!");
			}
		 }

	}
}

function validate_login(){
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$errors=[];
		$rollno=escape(clean($_POST['rollno']));
		$password=escape(clean($_POST['password']));
		$password=sha1($password);

		$sql ="SELECT id FROM users WHERE rollno='$rollno' AND password='$password'";
		$result=query($sql);

		if(row_count($result)){
			$sql1 = "SELECT * FROM users WHERE rollno='$rollno' AND active=1";
			$result1=query($sql1);
			if(row_count($result1)){
				$row = fetch_array($result1);
				$unit = $row['unit'];
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            		$spreadsheet = $reader->load("../attendance.xlsx");
				$sheetData = $spreadsheet->getSheetByName($unit)->toArray();

				$arrayName=$sheetData;
				$rowSize = count( $arrayName );
				$columnSize = max( array_map('count', $arrayName) );

				for($x=3; $x<=$rowSize; $x++){
					if(strtolower($sheetData[$x][1])==strtolower($rollno)){
						$rowNo = $x;
						break;
					}
				}
				// echo $rowNo;
				$total_hour = $sheetData[$rowNo][2];
				$attendance = array();

				for($y=$columnSize; $y>=4; $y--){
					if(!empty($sheetData[$rowNo][$y])){
						$subAttendance=array();
						$subAttendance['hour']=$sheetData[$rowNo][$y];
						$subAttendance['date'] = $sheetData[0][$y];
						$subAttendance['activity'] = $sheetData[1][$y];
						$attendance[]=$subAttendance;
					}
				}
				$response = array();
				$response['attendance']=$attendance;

				$_SESSION['rollno']=$rollno;
				$_SESSION['name']=$sheetData[$rowNo][0];
				$_SESSION['unit']=$unit;
				$_SESSION['phone']=$sheetData[$rowNo][2];
				$_SESSION['total_hour']=$total_hour;
				$_SESSION['attendance']=json_encode($response);

				redirect("profile.php");
			}else{
				echo validation_errors("Your account has not yet been activated by the core team. Please contact the core team to activate your account.");
			}
		}else{
			echo validation_errors("Please enter correct credentials.");
		}
	}
}

function logged_in(){
	if(isset($_SESSION['rollno']) || isset($_COOKIE['rollno'])){
		return true;
	}
	else{
		return false;
	}
}

function blood_request(){
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$name=escape(clean($_POST["BName"]));
		$roll=escape(clean($_POST["BRoll"]));
		$email=escape(clean($_POST["BEmail"]));
		$phone=escape(clean($_POST["BPhone"]));
		$for_whom=escape(clean($_POST["BForWhom"]));
		$address=escape(clean($_POST["BAddress"]));
		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/google-service-account.json');

		$subject="Blood Request from NSS";
		$msg="
			<p>$name has requested for blood. </p>
			<p>Details: </p>
			<h5>Name : $name</h5>
			<h5>Roll/Employee ID : $roll</h5>
			<h5>Email : $email</h5>
			<h5>Phone : $phone</h5>
			<h5>For Whom : $for_whom</h5>
			<h5>Address : $address</h5>
		";
		$header="From: nss@iitp.ac.in";
		$send_to ="nss@iitp.ac.in";

		if (send_email($send_to,$subject,$msg,$header)){
			// echo "Your request has been sent to team NSS Team IIT Patna";
			$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->create();

			$database = $firebase->getDatabase();
			$newPost = $database
			->getReference('requestBlood')
			->push([
				'name' => $name,
				'id_roll' => $roll,
				'email' => $email,
				'phone'=> $phone,
				'blood_for_whom' => $for_whom,
				'address'=> $address
			]);
			echo "Your request has been sent to team NSS Team IIT Patna";
		}
	}
}
