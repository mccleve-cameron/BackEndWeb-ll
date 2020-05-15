<?php
session_start();

if (isset($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="cart.css">
</head>

<header class="softRed">Confirm Your Purchase</header>
<body>
    <form method="POST" action="confirm.php">
        <h3>Enter Your Address</h3>
        <input type="text" name="address" placeholder="address">
        <button type="submit">Submit</button>
    </form>
    <div>
        <button><a href="cart.php">Back to Cart</a></button>
    </div>
</body>

<footer class="softRed">
        &copy; 2020 | Cameron McCleve | CSE 341
</footer>
</html>