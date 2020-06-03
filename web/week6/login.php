<?php
    session_start();
    require "../dbConnect.php";
    $db = getDb();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<header>
    <img src="logo.png" alt="">
</header>

<body>
    <form action="goal.php" method="get" class="input"> 
        <input id="uInput" name="username" type="search" placeholder="username">
        <input id="password" type="text" placeholder="password">
        <button id="login" type="submit">Login</button>
    </form>
</body>

</html>