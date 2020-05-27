<?php
    require('dbConnect.php');
    $db = get_db();
    
    session_start();
    
    foreach ($db->query('SELECT username, password FROM users') as $row)
    {
        $_SESSION[username] = $row['username']
        $row['password']
    }

    foreach ($db->query('SELECT goal_text, is_complete, goal_date FROM goals') as $row)
    {
        echo '<p>' . $row['goal_date'] . ' - ' 
        . $row['goal_text'] . ' - '. $row['is_complete'] . '"</p>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoHabit</title>
</head>
<header><h1>GoHabit</h1></header>
<body>
    <h3>Search for a Username</h3>
    <input id="search" type="search" placeholder="username">
<?php

    ?>
</body>
</html>