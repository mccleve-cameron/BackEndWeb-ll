<?php
    session_start();
    require "../../dbConnect.php";
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
    <div class="input">
    <input id="username" type="search" placeholder="username">
    <input id="password" type="text" placeholder="password">
    <button id="login">Login</button>
    </div>
    </table>
</body>

</html>