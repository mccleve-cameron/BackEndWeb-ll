<?php
    session_start();
    require "../dbConnect.php";
    $db = getDb();

    if (!isset($_GET['username'])) { 
        die("Error, username not specified...");
    }

    $_SESSION['username'] = $_GET['username'];
    $username = $_SESSION['username'];
    

    $stmt = $db->prepare("SELECT * FROM users AS u 
                    JOIN goals AS g 
                    ON u.id = g.user_id
                    WHERE username=:name");
    $stmt->bindValue(':name', $username, PDO::PARAM_STR);
    $stmt->execute();
    $userGoals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $db->prepare("SELECT * FROM users AS u 
                    JOIN habits AS h 
                    ON u.id = h.user_id
                    WHERE username=:name");
    $stmt2->bindValue(':name', $username, PDO::PARAM_STR);
    $stmt2->execute();
    $userHabits = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
    if (!isset($_SESSION['date'])) {

        $_SESSION['date']= date("Y-m-d");
    }
    if (isset($_GET['leftBut'])) {
        $tmp1 = $_SESSION['date'];
        $_SESSION['date'] = date("Y-m-d", strtotime("$tmp1 -1 day"));
    }
    if (isset($_GET['rightBut'])) {
        $tmp2 =$_SESSION['date'];
        $_SESSION['date'] = date("Y-m-d", strtotime("$tmp2 +1 day"));
    }
    
    $currentDate = $_SESSION['date'];
    $userId = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoHabit</title>
    <link rel="stylesheet" href="goal.css">
</head>
<form action="goal.php" method="get">
    <header>
        <button type="submit" name="leftBut" value="leftBut">
            <input type="hidden" name="username" value="<?php echo $username; ?>">  
            <i id="leftArrow" type="submit" name="left">&lt;</i>
        </button>
        <article><?php 
        $tmp3 = $_SESSION['date'];
        echo date("l, M d", strtotime($tmp3)); ?></article>
        <button type="submit" name="rightBut" value="rightBut"> 
            <i id="rightArrow">&gt;</i>
        </button>
    </header>
</form>

<body>
<h2><?php     


    $username = $userGoals[0]['username'];
    echo $username;
 ?></h2>
      <h3>Daily Goals</h3>
    <table>
        <tr>
            <th>Date</th>
            <th>Goal</th>
            <th>Status</th>
        </tr>
<?php
    foreach ($userGoals as $user){
        $userId = $user['user_id'];
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

        if ($date == $_SESSION['date']) {
            echo( 
                "<tr>
                    <td>$date</td>
                    <td><input type='checkbox'>$goal</td>
                    <td>$complete</td>
                </tr>");
        }
    }
    
?>

</table>
    <form action="insert_goal.php" method="get">
        <input type="hidden" name="date" value="<?php echo $_SESSION['date']; ?>">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <input type="text" name="goalContent" id="goalContent">
        <input type="submit" value="Add Goal">
    </form>
    <h3>Weekly Habits</h3>
    <table>
        <tr>
            <th>Days</th>
            <th>Habit</th>
            <th>Status</th>
        </tr>
<?php
    foreach ($userHabits as $userh){
        $habit = $userh['habit_text'];
        $complete = $userh['is_complete'];
        $date = $userh['habit_date'];

        if ($complete) {
            $complete = 'completed';
        }
        else {
            $complete = 'not done';
        }
        echo( 
        "<tr>
            <td>$date</td>
            <td>$habit</td>
            <td>$complete</td>
        </tr>");
    }
    
?>
</table>

</body>
<footer>
    <span><button><a href="login.php">Logout</a></button></span>
    <span><button>Add</button></span>
</footer>
</html>