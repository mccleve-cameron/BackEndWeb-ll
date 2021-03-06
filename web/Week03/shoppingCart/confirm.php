<?php
session_start();

if (isset($_POST['address'])) {
    $_SESSION['address'] = htmlspecialchars($_POST['address']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm</title>
    <link rel="stylesheet" href="cart.css">
</head>

<header class="softRed">Thanks for Your Purchase!</header>
<body>
    <h3>Your items...</h3>
    <div>
    <ul>
        <?php
        foreach($_SESSION as $Key => $Value) {
            if($Key != "address"){
            echo "<li>$Value</li>";
            }
        }
        ?>
    </ul>
    </div>
    <h3>...will be shipped to:</h3>
    <div>
    <?php echo $_SESSION['address']; ?>
    </div>
</body>

<footer class="softRed">
        &copy; 2020 | Cameron McCleve | CSE 341
</footer>
</html>