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
$comment = $_POST['comment']
$continents = $_POST["continent"];

		echo "Name is: ".$name. "<br/>";		
		echo "Email is: ".$email. "<br/>";
        echo "Major is: " .$major. "<br/>";
		


		echo "<h3>Continents you've been to!</h3>";
	
        foreach($continents as $continent) { 
            $continent_clean = htmlspecialchars($continent);
        echo "<li><p>$continent_clean</p><?li>";
        }


		?>
    
</body>

		<form action="assign11_a.php" method="post">
        <div><input type="submit" name="review" value="Confirm"> </div>
        <div><input type="submit" name="review" value="Cancel"></div>
		</form>

<footer>END</footer>

</html>
