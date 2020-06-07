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
        <input id="password" name="password" type="text" placeholder="password">
        <button id="login" type="submit">Login</button>
    </form>
    <section>
        <h4>login options</h4>
        <table class="tmp">
            <tr>
                <th>username-</th>
                <th>-password</th>
            </tr>
            <tr>
                <td>John</td>
                <td>john1</td>
            </tr>
            <tr>
                <td>Sue</td>
                <td>sue1</td>
            </tr>
            <tr>
                <td>Bob</td>
                <td>bob1</td>
            </tr>
            <tr>
                <td>Joe</td>
                <td>joe1</td>
            </tr>
        </table>
    </section>
</body>

</html>