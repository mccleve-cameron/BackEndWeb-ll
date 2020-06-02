<?php
    session_start();
    require "../../dbConnect.php";
    $db = getDb();

    $name = 'John';
    if (isset($_GET['uInput'])) { 
        $_SESSION['username'] = $_GET['uInput'];
        $name = $_SESSION['username'];
    }

    $stmt = $db->prepare("SELECT * FROM users AS u 
                    JOIN goals AS g 
                    ON u.id = g.user_id
                    WHERE username=:name");
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $userGoals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $db->prepare("SELECT * FROM users AS u 
                    JOIN habits AS h 
                    ON u.id = h.user_id
                    WHERE username=:name");
    $stmt2->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt2->execute();
    $userHabits = $stmt2->fetchAll(PDO::FETCH_ASSOC);
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