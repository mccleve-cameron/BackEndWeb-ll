<?php
session_start();

if (isset($_POST['removeHat'])){unset($_SESSION['hat']);}
if (isset($_POST['removeShirt'])){unset($_SESSION['shirt']);}
if (isset($_POST['removeShoes'])){unset($_SESSION['shoes']);}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="practice.css">
</head>

<header class="softRed">Items in cart</header>
<body>

<h3>Manage Your Cart:</h3>
<?php
foreach($_SESSION as $Key => $Value) {
    echo "<h4>$Value</h4>";
}
?>
<form method="POST" action="">
    <button name="removeHat" value="removeHat">delete</button>
</form>
<form method="POST" action="">
    <button name="removeShirt" value="removeShirt">delete</button>
</form>
<form method="POST" action="">
    <button name="removeShoes" value="removeShoes">delete</button>
</form>
    <div>
        <button><a href="browse.php">Back to Browse</a></button>
        <button><a href="checkout.php">Continue to Checkout</a></button>
    </div>
</body>

<footer class="softRed">
        &copy; 2020 | Cameron McCleve | CSE 341
</footer>
</html>