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
                    WHERE username=:name
                    ORDER BY g.id;");
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<form action="goal.php" method="get">
    <header>
        <button type="submit" name="leftBut" value="leftBut" class="arrowBut">
            <input type="hidden" name="username" value="<?php echo $username; ?>">  
            <i id="leftArrow" type="submit" name="left">&lt;</i>
        </button>
        <article><?php 
        $tmp3 = $_SESSION['date'];
        echo date("l, M d", strtotime($tmp3)); ?></article>
        <button type="submit" name="rightBut" value="rightBut" class="arrowBut"> 
            <i id="rightArrow">&gt;</i>
        </button>
    </header>
</form>

<body>
<h2><?php     


    $username = $userGoals[0]['username'];
    echo $username;
 ?></h2>
    <b>Today's Goals</b>
    <table>

<?php
    foreach ($userGoals as $user){
        $userId = $user['user_id'];
        $taskId = $user['id'];
        $username = $user['username'];
        $password = $user['password'];
        $goal = $user['goal_text'];
        $complete = $user['is_complete'];
        $date = $user['goal_date'];


    
        if ($date == $_SESSION['date']) {
            if ($complete) {
                $complete = true;
                echo( 
                    "<tr>
                        <td class='icon'>
                            <form action='complete_goal.php' method='get'>
                                <input class='checked' type='submit' value=''>
                                <input type='hidden' name='username' value='$username'>
                                <input type='hidden' name='taskId' value='$taskId'>
                                <input type='hidden' name='complete' value='$complete'>
                            </form>
                        </td>
                        <td class='linethru'>$goal</td>
                        <td class='icon'>                    
                            <form action='delete_goal.php' method='get'>
                                <input type='hidden' name='username' value='$username'>
                                <input type='hidden' name='taskId' value='$taskId'>
                                <input type='submit' class='trash' value=''>
                            </form>
                        </td>
                    </tr>");
            }
            else {
                $complete = false;
                echo( 
                "<tr>
                <td class='icon'>
                <form action='complete_goal.php' method='get'>
                    <input class='circle' type='submit'  value=''>
                    <input type='hidden' name='username' value='$username'>
                    <input type='hidden' name='taskId' value='$taskId'>
                    <input type='hidden' name='complete' value='$complete'>
                </form>
            </td>
                    <td>$goal</td>
                    <td class='icon'>                    
                        <form action='delete_goal.php' method='get'>
                            <input type='hidden' name='username' value='$username'>
                            <input type='hidden' name='taskId' value='$taskId'>
                            <input type='submit' class='trash' value=''>
                        </form>
                    </td>
                </tr>");
            }
        }
    }
    
?>

</table>
    <form action="insert_goal.php" method="get" class="addText">
        <input type="hidden" name="date" value="<?php echo $_SESSION['date']; ?>">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <input type="text" name="goalContent" id="goalContent" placeholder="add goal">
        <input type="submit" value='' class="add">
    </form>


</body>
<footer>
    <span><button><a href="login.php">Logout</a></button></span>
</footer>
</html>