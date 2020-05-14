<?php
session_start();

if (isset($_POST['removeHat']))
{
    unset($_SESSION['hat']);
}
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

<?php
foreach($_SESSION as $Key => $Value) {
    echo $Value;
}
?>
<form method="POST" action="">
    <button name="removeHat" value="removeHat">delete</button></form>
    <div>
        <button><a href="browse.php">Back to Browse</a></button>
        <button><a href="#">Continue to Checkout</a></button>
    </div>
</body>
</html>