<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="teamProj3.css">
</head>

<header>Confirm Purchase</header>

<body>

	<h2>Please Review Your Purchase;</h2>
    
<?php

$name = $_POST['Name'];
$email = $_POST['email'];
$major = $_POST['major'];

		echo "Name is: ".$name. "<br/>";		
		echo "Email is: ".$email. "<br/>";
        echo "Major is: " .$major. "<br/>";
		


		echo "<h3>Continents you've been to!</h3>";
		$total = 0;
		if(!empty($_POST['continent'])) {
			 foreach($_POST['continent']) { 

				echo "continent";
				echo "<br/>";
				
			 }
		 }


		?>
    
</body>

		<form action="assign11_a.php" method="post">
        <div><input type="submit" name="review" value="Confirm"> </div>
        <div><input type="submit" name="review" value="Cancel"></div>
		</form>

<footer>END</footer>

</html>
