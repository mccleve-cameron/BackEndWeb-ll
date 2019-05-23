<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cart.css">
</head>

<header>Confirm Purchase</header>

<body>

	<h2>Please Review Your Purchase;</h2>
    
<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$phone = $_POST['phoneNum'];
$cardType = $_POST['cct'];
$cardEx = $_POST['expiration'];



		echo "First Name: ".$firstName. "<br/>";		
		echo "Last Name: ".$lastName. "<br/>";
		echo "Phone Number: ".$phone. "<br/>";
		echo "Address: " .$address. "<br/>";
		echo "Card Type: " .$cardType. "<br/>";
		echo "Card Expiration Date: " .$cardEx. "<br/>";
		


		echo "<h3>Items In Cart</h3>";
		$total = 0;
		if(!empty($_POST['cart'])) {
			 foreach($_POST['cart'] as $item) { 
				$JSON = json_decode($item); 
				$total = $total + $JSON->price;
				
				echo $JSON->item;
				echo " = $";
				echo $JSON->price;
				echo "<br/>";
				
			 }
				echo "<br/>";
				echo "Cart Total = $";
				echo $total;
		 }


		?>

    

    
    
    
    
    
</body>

		<form action="assign11_a.php" method="post">
        <div><input type="submit" name="review" value="Confirm"> </div>
        <div><input type="submit" name="review" value="Cancel"></div>
		</form>

<footer>END</footer>

</html>
