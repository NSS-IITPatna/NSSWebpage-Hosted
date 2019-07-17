<?php include("./../backend/functions.php");

session_destroy();
if(isset($_COOKIE['rollno'])){
	unset($_COOKIE['rollno']);
	setcookie('rollno','',time()-86400);
	unset($_COOKIE['attendance']);
	setcookie('attendance','',time()-86400);
}
redirect("login.php");