<?php include("./backend/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <title>Request Blood | NSS IIT Patna</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/icomoon.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/mainNSS/blood.png">

    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->


<!--Imported for the form only -->
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="css/util.css">
    	<link rel="stylesheet" type="text/css" href="css/main_blood.css">
    <!--===============================================================================================-->




</head>
<!--/head-->

<body>

  <header id="header" class="sticky">
      <nav class="navbar navbar-inverse" role="banner">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.html"><img src="images/mainNSS/nssweb.png" alt="logo" style="width: 150px; height: auto"></a>
              </div>

              <div class="collapse navbar-collapse navbar-right">
                  <ul class="nav navbar-nav">
                      <li ><a href="index.html">Home</a></li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Get Involved<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu">
                              <li><a href="about-us.html">About Us</a></li>
                              <li><a href="team.html">Our Team</a></li>
                              <li><a href="faq.html">Faqs</a></li>
                              <li><a href="./mag.html">Magazine 2k18-19</a></li>
                              <li><a href="https://docs.google.com/document/d/1EgpxEHza7NJGcw6CV3m7fv25ZJsbJpALqj1VH3ZOTl8/edit" target="_blank">Rules & Policies</a></li>
                          </ul>
                      </li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Units <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu">
                              <li><a href="adhyayan.html">Adhyayan</a></li>
                              <li><a href="bcells/cells.html?cell=technical">Technical Skills</a></li>
                              <li><a href="cells/cells.html?cell=rural">Rural Development</a></li>
                              <li><a href="cells/cells.html?cell=chetna">Chetna</a></li>
                              <li><a href="cells/cells.html?cell=teaching">Teaching</a></li>
                              <li><a href="cells/cells.html?cell=environment">Environmental</a></li>
                              <li><a href="prayatna/prayatna.html">Prayatna</a></li>
                          </ul>
                      </li>
                      <li><a href="team.html">Our Team</a></li>
                      <li><a href="events.html">Events</a></li>
                      <li><a href="portfolio.html">Gallery</a></li>
                      <li><a href="think_thank.html">Think-Thank</a></li>
                      <li><a href="./profile/login.php">Check-Hours</a></li>
                      <li><a href="./blood_request.php">Blood Request</a></li>
                      <li><a href="./help.html">Help!</a></li>
                  </ul>
              </div>
          </div>
          <!--/.container-->
      </nav>
      <!--/nav-->

  </header>


    <div class="page-title" style="background-image: url(images/mainNSS/blood_request.jpg); background-repeat: no-repeat;  background-size: 100% 100%;height: 200px; margin-top: 78px">
    </div>


<!--Form start here-->
    <div class="container-contact100">
      <div class="wrap-contact100">
      <div class="alert" style="display:Block"><?php blood_request() ?></div>
        <form class="contact100-form validate-form" id="bloodRequestForm" method="post">
          <span class="contact100-form-title">
            Request Blood
          </span>

          <div class="wrap-input100 validate-input" data-validate="Name is required">
            <span class="label-input100">Your Name</span>
            <input class="input100" type="text" name="BName" placeholder="Enter your name here..." id="BName" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" >
            <span class="label-input100">Roll No/Employee ID if from IIT Patna</span>
            <input class="input100" type="text" name="BRoll" font-size="12px" placeholder="Enter your Roll No/Employee ID here..." id="BRoll" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <span class="label-input100">Email</span>
            <input class="input100" type="email" name="BEmail" placeholder="Enter your email id here..." id="BEmail" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" pattern="[6-9]{1}[0-9]{9}" data-validate="Valid phone is required: 3456789121">
            <span class="label-input100">Phone Number</span>
            <input class="input100" type="text" name="BPhone" placeholder="Enter your phone number here..." id="BPhone" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" >
            <span class="label-input100">For whom do you want Blood Doner card? </span>
            <input class="input100" type="text" name="BForWhom" font-size="12px" placeholder="Enter for whom you want to take blood doner card..." id="BForWhom" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Message is required">
            <span class="label-input100">Address</span>
            <textarea class="input100" name="BAddress" placeholder="Write your address here..." id="BAddress" required></textarea>
            <span class="focus-input100"></span>
          </div>

          <div class="container-contact100-form-btn">
            <div class="wrap-contact100-form-btn">
              <div class="contact100-form-bgbtn"></div>
              <button class="contact100-form-btn" type="submit" name="submit_request">
                <span>
                  Submit
                  <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                </span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
   <iframe src="footer.html" frameborder="0" style="width: 100%; height:32vh"></iframe>

      <!--===============================================================================================-->
      	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
      <!--===============================================================================================-->
      	<script src="vendor/animsition/js/animsition.min.js"></script>
      <!--===============================================================================================-->
      	<script src="vendor/bootstrap/js/popper.js"></script>
      	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <!--===============================================================================================-->
      	<script src="vendor/select2/select2.min.js"></script>
      	<script>
      		$(".selection-2").select2({
      			minimumResultsForSearch: 20,
      			dropdownParent: $('#dropDownSelect1')
      		});
      	</script>
      <!--===============================================================================================-->
      	<script src="vendor/daterangepicker/moment.min.js"></script>
      	<script src="vendor/daterangepicker/daterangepicker.js"></script>
      <!--===============================================================================================-->
      	<script src="vendor/countdowntime/countdowntime.js"></script>
      <!--===============================================================================================-->
      	<script src="js/main_blood.js"></script>

      	<!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
      </script>
    <!--/#footer-->

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/jquery.mobile.custom.min.js"></script>

  <!-- Resource jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.2/firebase.js"></script>
  
    </body>

    </html>
