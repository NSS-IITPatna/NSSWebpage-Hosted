<?php



session_start();
$errors = [];

if(isset($_POST['submit'])){

	$username=$_POST['username'];
	$email=$_POST['email'];
	$college=$_POST['college'];
	$phone=$_POST['phone'];
    $mysqli =  mysqli_connect('localhost','root','','quiz');
	if(strlen($username)<5){
	 		$errors[]="Your  name cannot be less than 5";
	 	}

	 	if(strlen($phone)<10){
	 		$errors[]="Your phone number cannot be less than 10 digits.";
	 	}

	 	if (empty($_POST['college'])) {
        $errors['college'] = 'College name required';

	 	}
	 	if(strlen($phone)>10){
	 		$errors[]="Your phone number cannot have more than 10 digits.";
	 	}
	 	// Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }
	 	
	 	if (count($errors) === 0){
	 		
	 		//sanitise data
	 		$username=$mysqli->real_escape_string($username);
	 		$email=$mysqli->real_escape_string($email);
	 		$college=$mysqli->real_escape_string($college);
	 		$phone=$mysqli->real_escape_string($phone);
	 		//generate link
            
	 		$link=sha1($email.microtime());
	 		//insert data
            $insert= $mysqli->query("INSERT INTO users (username,email,college,phone,link)
             VALUES('$username','$email','$college','$phone','$link')");
	 		

	 		if($insert){


	 			//send email
                
	 			$subject="Activate quiz link";
		        $msg="<p>
		    You have successfully created an Account. 
		    Please click the link below to activate your quiz page.
		    <a href='http://nss.iitp.ac.in/quiz/index.php/$link/'>http://nss.iitp.ac.in/quiz/index.php/$link/
		    </a>
		    </p>

		     ";
		    $headers="From: noreply@yourwebsite.com";
            send_email($email,$subject,$msg,$headers);
            header('location:thankyou.php');

	 		}

	 	}

        
	 	

}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/icomoon.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/pricing.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,900' rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
        <style>
            body {
                margin:0px;
                font-family: "Roboto";
            }

            .back {
            background: linear-gradient(120grad, #643986, #98aed5);
            position: absolute;
            width: 100%;
            height: 100%;
            }

            .registration-form {
            width: 50%;
            position: absolute;
            left: 50%;
            -webkit-transform: translate(-50%, 0%);
                    transform: translate(-50%, 0%);
            top: 15%;
            background: transparent;
            }
            .registration-form header {
            position: relative;
            z-index: 4;
            background: white;
            padding: 20px 40px;
            border-radius: 15px 15px 0 0;
            }
            .registration-form header h1 {
            font-weight: 900;
            letter-spacing: 1.5px;
            color: #333;
            font-size: 23px;
            text-transform: uppercase;
            margin: 0;
            }
            .registration-form header p {
            word-spacing: 0px;
            color: #9facb6;
            font-size: 17px;
            margin: 0;
            margin-top: 5px;
            }
            .registration-form form {
            position: relative;
            }
            .registration-form .input-section {
            width: 100%;
            position: absolute;
            display: -webkit-box;
            display: flex;
            left: 50%;
            -webkit-transform: translate(-50%, 0);
                    transform: translate(-50%, 0);
            height: 75px;
            border-radius: 0 0 15px 15px;
            overflow: hidden;
            z-index: 2;
            box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.2);
            -webkit-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            }
            .registration-form .input-section.folded {
            width: 95%;
            margin-top: 10px;
            left: 50%;
            -webkit-transform: translate(-50%, 0);
                    transform: translate(-50%, 0);
            z-index: 1;
            
            }
            .registration-form .input-section.folded input {
            background-color: #e9e2c0;
            }
            .registration-form .input-section.folded span {
            background-color: #e9e2c0;
            }
            .registration-form .input-section.folded + .folded {
            width: 90%;
            margin-top: 20px;
            left: 50%;
            -webkit-transform: translate(-50%, 0);
                    transform: translate(-50%, 0);
            z-index: 0;
            }

            .registration-form .input-section.folded + .folded + .folded {
            width: 85%;
            margin-top: 30px;
            left: 50%;
            -webkit-transform: translate(-50%, 0);
                    transform: translate(-50%, 0);
            z-index: -1;
            }
            .registration-form .input-section.folded + .folded input {
            background-color: #e1bcef;
            }
            .registration-form .input-section.folded + .folded span {
            background-color: #e1bcef;
            }

            .registration-form .input-section.folded + .folded + .folded input {
            background-color: #bcefca;
            }
            .registration-form .input-section.folded + .folded + .folded span {
            background-color: #bcefca;
            }
            .registration-form .input-section.fold-up {
            margin-top: -75px;
            }
            .registration-form .input-section.fold-up + .fold-up {
            margin-top: -75px;
            }
            .registration-form form input {
            background: white;
            color: #8f8fd6;
            width: 80%;
            border: 0;
            padding: 20px 40px;
            margin: 0;
            }
            .registration-form form input:focus {
            outline: none;
            }
            .registration-form form input::-webkit-input-placeholder {
            color: #8f8fd6;
            font-weight: 100;
            }
            .registration-form form input::-moz-placeholder {
            color: #8f8fd6;
            font-weight: 100;
            }
            .registration-form form input:-ms-input-placeholder {
            color: #8f8fd6;
            font-weight: 100;
            }
            .registration-form form input::-ms-input-placeholder {
            color: #8f8fd6;
            font-weight: 100;
            }
            .registration-form form input::placeholder {
            color: #8f8fd6;
            font-weight: 100;
            }

            .animated-button {
            width: 20%;
            background-color: #d4d4ff;
            }
            .animated-button span {
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-direction: row;
            justify-content: space-around;
            -webkit-box-align: center;
                    align-items: center;
            line-height: 75px;
            text-align: center;
            height: 75px;
            -webkit-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            }
            .animated-button span i {
            font-size: 25px;
            color: #9999f8;
            }
            .animated-button .next-button {
            background: transparent;
            color: #9999f8;
            font-weight: 100;
            width: 100%;
            border: 0;
            }

            .next {
            margin-top: -75px;
            }

            .success {
            width: 100%;
            position: absolute;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
                    align-items: center;
            left: 50%;
            -webkit-transform: translate(-50%, 0);
                    transform: translate(-50%, 0);
            height: 75px;
            border-radius: 0 0 15px 15px;
            overflow: hidden;
            z-index: 2;
            box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.2);
            -webkit-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            background: limegreen;
            margin-top: -75px;
            }
            .success p {
            color: white;
            font-weight: 900;
            letter-spacing: 2px;
            font-size: 18px;
            width: 100%;
            text-align: center;
            }

        </style>
    </head>

    <body><?php if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
               
        <div class="back"></div>
        
        <div class="registration-form">
            <div style="text-align: center;">
                <h1 style="color: cornsilk;">Welcome to the IIT Patna quiz on Corona virus</h1>
            </div> 
        <header>
            <h1>Register for the quiz here!!</h1>
            <p>Fill in all informations</p>
        </header>
        

        <form  method="POST" action="">

            <div class="input-section name-section">
            <input class="name" type="name" name="username" placeholder="ENTER YOUR NAME HERE" autocomplete="off"/>
            <div class="animated-button"><span class="icon-paper-plane"><i class="fa fa-user"></i></span><span class="next-button name"><i class="fa fa-arrow-up"></i></span></div>
            </div>
            <div class="input-section email-section folded">
            <input class="email" type="email" name="email"placeholder="ENTER YOUR E-MAIL HERE" autocomplete="off"/>
            <div class="animated-button"><span class="icon-paper-plane"><i class="fa fa-envelope-o"></i></span><span class="next-button email"><i class="fa fa-arrow-up"></i></span></div>
            </div>
            <div class="input-section college-section folded">
            <input class="college" type="college" name="college" placeholder="ENTER YOUR COLLEGE HERE"/>
            <div class="animated-button"><span class="icon-paper-plane"><i class="fa fa-university"></i></span><span class="next-button college"><i class="fa fa-arrow-up"></i></span></div>
            </div>
            <div class="input-section ph-no-section folded">
            <input class="ph-no" type="ph-no" name="phone" placeholder="ENTER YOUR PHONE NUMBER HERE"/>

            
            <div class="animated-button"><span class="icon-paper-plane"><i class="fa fa-phone"></i></span><span class="next-button ph-no"><i class="fa fa-paper-plane"></i></span></div>
            </div>
            <div class="success"> 
            <input class="ph-no" type="submit" name="submit" value="REGISTER" required/>
            </div>
        </form>
        </div>
        
       
        <script>

            $(".name").on("change keyup paste", function () {
            if ($(this).val()) {
                $(".icon-paper-plane").addClass("next");
            } else {
                $(".icon-paper-plane").removeClass("next");
            }
            });

            $(".next-button").hover(function () {
            $(this).css("cursor", "pointer");
            });

            $(".next-button.name").click(function () {
            console.log("Something");
            $(".name-section").addClass("fold-up");
            $(".email-section").removeClass("folded");
            });

            $(".email").on("change keyup paste", function () {
            if ($(this).val()) {
                $(".icon-paper-plane").addClass("next");
            } else {
                $(".icon-paper-plane").removeClass("next");
            }
            });

            $(".next-button").hover(function () {
            $(this).css("cursor", "pointer");
            });

            $(".next-button.email").click(function () {
            console.log("Something");
            $(".email-section").addClass("fold-up");
            $(".college-section").removeClass("folded");
            });

            $(".college").on("change keyup paste", function () {
            if ($(this).val()) {
                $(".icon-paper-plane").addClass("next");
            } else {
                $(".icon-paper-plane").removeClass("next");
            }
            });

            $(".next-button").hover(function () {
            $(this).css("cursor", "pointer");
            });

            $(".next-button.college").click(function () {
            console.log("Something");
            $(".college-section").addClass("fold-up");
            $(".ph-no-section").removeClass("folded");
            });

            $(".ph-no").on("change keyup paste", function () {
            if ($(this).val()) {
                $(".icon-paper-plane").addClass("next");
            } else {
                $(".icon-paper-plane").removeClass("next");
            }
            });

            $(".next-button.ph-no").click(function () {
            console.log("Something");
            $(".ph-no-section").addClass("fold-up");
            $(".success").css("marginTop", 0);
            });

        </script>


    </body>
</html>