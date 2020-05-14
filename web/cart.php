<?php
session_start();

if (isset($_POST['hat'])){unset($_SESSION['hat']);}
if (isset($_POST['shirt'])){unset($_SESSION['shirt']);}
if (isset($_POST['shoes'])){unset($_SESSION['shoes']);}

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
    echo ("<h2>$Value</h2> <br>"; + "
<form method="POST" action="">
    <button name="$Key" value="$Value">delete</button>
</form>")

}
?>

    <div>
        <button><a href="browse.php">Back to Browse</a></button>
        <button><a href="checkout.php">Continue to Checkout</a></button>
    </div>
</body>
</html>