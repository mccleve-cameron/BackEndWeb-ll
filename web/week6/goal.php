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
    <title>GoHabit</title>
    <link rel="stylesheet" href="goal.css">
</head>
<header>
    <i id="leftArrow">&lt;</i>
    <article id="date"></article>
    <i id="rightArrow">&gt;</i>
</header>

<body>

    <h2>Bob</h2>
    <h3>Daily Goals</h3>
    <table>
        <tr>
            <th>Date</th>
            <th>Goal</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>2020-05-12</td>
            <td>take out trash knolnk popop npo</td>
            <td>done</td>
        </tr>
        <tr>
            <td>2020-05-12</td>
            <td>take out trash knolnk popop npo</td>
            <td>done</td>
        </tr>
        <tr>
            <td>2020-05-12</td>
            <td>take out trash knolnk popop npo</td>
            <td>done</td>
        </tr>
    </table>
    <h3>Weekly Habits</h3>
    <table>
        <tr>
            <th>Days</th>
            <th>Habit</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>7</td>
            <td>non oioieopiwe</td>
            <td>done</td>
        </tr>
    </table>
    <script src="goal.js"></script>
</body>

</html>