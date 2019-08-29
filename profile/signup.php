<?php include("../backend/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign Up | NSS IIT Patna</title>

    <!-- core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/icomoon.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/pricing.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="icon" href="images/nss.png">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
	<meta name="google-site-verification" content="_gyiigXcvkgghx9PqO-7J7m6IGkh3v8yhU7kaIIIna0" />
    <meta name="msvalidate.01" content="1E858DE352998C73F3BA7E5D241A9D8E" />

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../images/mainNSS/logo.ico">
    <link rel="apple-touch-icon-precomposed" href="../images/mainNSS/logo.jpeg">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <meta name="google-site-verification" content="5jeUjq5UnPfqIsVV7KlXIlMmCH6EgLDvLI4C-aCcGpM"/>
  
<style>
.blinking{
	animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
	0%{		color: #4F01F9;	}
	49%{	color: #01AEF9;	}
	50%{	color: #01F918;	}
	99%{	color:#F95401;	}
	100%{	color: #F90118;	}
}
</style>

</head>
<!--/head-->

<body class="homepage" style="background-image: url('assets/img/profilebg.jpg'); background-repeat: no-repeat; background-size: 100% 100%;height: 100%;">
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
                    <a class="navbar-brand" href="../"><img src="../images/mainNSS/nssweb.png" alt="logo" style="width: 150px; height: auto"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../">Home</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Get Involved<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu">
                              <li><a href="../about-us.html">About Us</a></li>
                              <li><a href="../team.html">Our Team</a></li>
                              <li><a href="../faq.html">Faqs</a></li>
                              <li><a href="https://docs.google.com/document/d/1EgpxEHza7NJGcw6CV3m7fv25ZJsbJpALqj1VH3ZOTl8/edit" target="_blank">Rules & Policies</a></li>
                          </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Units <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="../adhyayan.html">Adhyayan</a></li>
                                <li><a href="../cells/cells.html?cell=technical">Technical Skills</a></li>
                                <li><a href="../cells/cells.html?cell=rural">Rural Development</a></li>
                                <li><a href="../cells/cells.html?cell=chetna">Chetna</a></li>
                                <li><a href="../cells/cells.html?cell=teaching">Teaching</a></li>
                                <li><a href="../cells/cells.html?cell=environment">Environmental</a></li>
                                <li><a href="../prayatna/prayatna.html">Prayatna</a></li>
                            </ul>
                        </li>
                        <li><a href="../team.html">Our Team</a></li>
                        <li><a href="../events.html">Events</a></li>
                        <li><a href="../portfolio.html">Gallery</a></li>
                        <li><a href="../think_thank.html">Think-Thank</a></li>
                        <li><a href="../profile/login.php">Check-Hours</a></li>
                        <li><a href="../blood_request.php">Blood Request</a></li>

                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>  
    </header>
    <!--/header-->
    <!--Start of the form-->
    <section style="margin-top: 30px;">
        <div class="container main-bg" style="z-index: 10 !important; height: 100%">
            <div>
                <form action="#" method="post" class="form-group">
                    <?php validate_user_registration() ?>
                    <h3 class="legend" style=" color: #1d82b1;"><i class="fas fa-user-plus fa-1.5x px-2"></i>SignUp</h3>
                    <div class="input">
                        <input type="text" placeholder="Name" class="form-control" name="name" id="name" required/>
                    </div>
                    <div class="input">
                        <input type="email" placeholder="Email" class="form-control" name="email" id="email" required/>
                    </div>
                    <div class="input">
                        <input type="text" placeholder="Roll No." class="form-control" name="rollno" id="rollno" required/>
                    </div>
                    <div class="input">
                        <select class="custom-select" name="unit" id="unit" required>
                            <label class="mr-sm-2" required></label>
                            <option value="" disabled selected>Unit Name..<h1 style="color:black !important;" ><i class="fas fa-caret-down fa-0.5x"></i></h1></option>
                            <option value="Environment">Environment</option>
                            <option value="Chetna">Chetna</option>
                            <option value="Adhyayan">Adhyayan</option>
                            <option value="Rural Development">Rural Development</option>
                        </select>
                    </div>
                    <div class="input">
                        <input type="phone" placeholder="Phone Number" class="form-control" name="phone" id="phone" required/>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password" class="form-control" name="password" id="password" required/>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Confirm password" class="form-control" name="confirm_password" id="confirm_password" required/>
                    </div>
                    <button type="submit" class="btn submit" name="signup" id="signup">SignUp</button>
                    <div>
                        <p style="letter-spacing: 1px; padding-top: 10px;padding-bottom: 20px !important;font-size:15px;">Already have an Account?<strong><a href="login.php" style="margin-left:5px; margin-right:5px;font-size: 20px;">Login</a></strong>here</p>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!--End of Form-->
    <iframe src="../footer.html" frameborder="0" scrolling="no" style="width: 100%"></iframe>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

    <!-- Defining function for fixed header -->
    <script>
        window.onscroll = function() {myFunction()};
        function myFunction() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        }
    </script>    

</body>

</html>