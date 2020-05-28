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
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<form method="GET" action="data.php">
    <input id="uInput" type="search" name="uInput" placeholder="username">
    <button type="submit" id="search"  name="search">Search</button>
</form>
<h2>Bob's Goals</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Goal</th>
            <th>Status</th>
        </tr>
<?php
    $username = $users[0]['username'];
    echo $username;

    foreach ($users as $user){
        $id = $user['id'];
        $username = $user['username'];
        $password = $user['password'];
        $goal = $user['goal_text'];
        $complete = $user['is_complete'];
        $date = $user['goal_date'];

        if ($complete) {
            $complete = 'completed';
        }
        else {
            $complete = 'not done';
        }
        echo( 
        "<tr>
            <td>$date</td>
            <td>$goal</td>
            <td>$complete</td>
        </tr>");
    }
    
?>
</body>
</html>