<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="confirm.php">
        <input type="text" name="address">
        <button><a href="confirm.php" type="submit">Submit</a></button>
    </form>
    <div>
        <button><a href="cart.php">Back to Cart</a></button>
    </div>
</body>
</html>