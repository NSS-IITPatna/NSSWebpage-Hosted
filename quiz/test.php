<?php
	session_start();
	
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<style>
		*, *:after, *:before {
		box-sizing: border-box;
		}

		body {
		background: #FFD300;
		}

		.container {
		width: 800px;
		max-width: 100%;
		margin: 0 auto;
		}

		.btn-send {
		display: block;
		background: black;
		margin: 20px 0;
		padding: 19px 20px;
		color: white;
		font-size: 18px;
		border: none;
		width: 100%;
		cursor: pointer;
		}

		.question {
		background: white;
		padding: 30px;
		}

		.question-text {
		margin: 10px;
		}

		.question-answer {
		list-style: none;
		margin: 0;
		padding: 0;
		display: -webkit-box;
		display: flex;
		flex-wrap: wrap;
		margin: 0 -10px;
		}

		.question-answer__item {
		width: 50%;
		padding: 10px;
		-webkit-box-flex: 1;
				flex-grow: 1;
		}
		@media (max-width: 760px) {
		.question-answer__item {
			width: 100%;
		}
		}

		.question-answer__item label {
		display: block;
		padding: 20px 20px 20px 20px;
		border: 1px solid #d7d7d7;
		box-shadow: 2px 2px 0px 0px #d7d7d7;
		background: #fff;
		cursor: pointer;
		will-change: background, color;
		-webkit-transition: .2s;
		transition: .2s;
		}

		.question-answer__item input[type="checkbox"][disabled] + label {
		cursor: auto;
		}

		.question-answer__item input[type="checkbox"] {
		opacity: 0;
		height: 0;
		width: 0;
		display: block;
		}

		.question-answer__item input[type="checkbox"][disabled] + label {
		background: #bbb;
		box-shadow: none;
		border-coloR: transparent;
		}

		.question-answer__item input[type="checkbox"]:checked + label {
		background: #E8180A;
		color: white;
		}

		.question-answer__item[data-good-answer] input[type="checkbox"]:checked + label {
		background: #28A536;
		color: white;
		}

		.result__send {
		max-width: 400px;
		margin: 0 auto;
		}

		.result__remaing {
		font-size: 3em;
		text-align: center;
		margin: 30px 0;
		}

		.result__remaing-count {
		font-weight: bold;
		}

		

	</style>
</head>
<body>
	<div class="container">
  <h1>NSS IIT Patna Corona Quiz</h1>
 <form action="" method="post" id="frm">
	<?php

   $mysqli =  mysqli_connect('localhost','root','','quiz');
	

if (isset($_GET['link'])) {
$id = $_GET['link'];
$sql = "SELECT username,email FROM users WHERE link='$id' LIMIT 1";
 $result = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($result)) {
?>


  
  
  	<div class="group" style="padding:5px">
  		
  		 <input type="hidden" name="" value=" <?php echo $row['username']; ?> " required>
   
</div>
<div class="group" style="padding:5px">
	  
	  <input type="hidden" name="" value=" <?php echo $row['email']; ?>"required>
    </div>
	 <?php
	}
}
?>
	
    <div class="question" id="question" >
    	<?php   



                          $data = file_get_contents("quiz.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  
                               echo  '<h2 class="question-text" id=" ' .$row["id"].' "> ' .$row["question"].' </h2><div class="quesiton-option"><ul class="question-answer"><li class="question-answer__item"><input type="checkbox" name="answer[1]" value=" ' .$row["opt1"].'" id="opt1"><label for="opt1" id="optt1"> ' .$row["opt1"].' </label></li><li class="question-answer__item"><input type="checkbox" name="answer[1]" value=" ' .$row["opt2"].'" id="opt2"><label for="opt2" id="optt2">' .$row["opt2"].'</label></li><li class="question-answer__item"><input type="checkbox" name="answer[1]" value=" ' .$row["opt3"].'" id="opt3"><label for="opt3" id="optt3">' .$row["opt3"].'</label></li> <li class="question-answer__item"><input type="checkbox" name="answer[1]" value=" ' .$row["opt4"].'" id="opt4"><label for="opt4" id="optt4">' .$row["opt4"].'</label></li></ul></div>';  
                          }  
                          ?>  

    	
    </div>
      
     
    
            
    <div class="result">
      <div class="result__send">
        <button type="submit" class="btn-send">Submit</button>
      </div>
    </div>
  </form>
</div>

<script>
// the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>

        
    
          








     
            
		
			

 

</body>
</html>







