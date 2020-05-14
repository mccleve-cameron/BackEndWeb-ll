<?php
session_start();

if (isset($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
}

echo $_SESSION['address'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm</title>
    <link rel="stylesheet" href="practice.css">
</head>

<header class="softRed">Thanks for Your Purchase!</header>
<body>
    <h3>Your items...</h3>
    <ul>
        <?php
        foreach($_SESSION as $Key => $Value) {
            if($_SESSION[$Key] != 'address'){
            echo "<li>$Value</li>";
            }
        }
        ?>
    </ul>
    <h3>...will be shipped to:</h3>
    <?php echo $_SESSION['address']; ?>
</body>

<footer class="softRed">
        &copy; 2020 | Cameron McCleve | CSE 341
</footer>
</html>