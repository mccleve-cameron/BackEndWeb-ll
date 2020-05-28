<?php
    session_start();
    require "../../dbConnect.php";
    $db = getDb();

    if (isset($_GET['uInput'])) {
        
        $_SESSION['username'] = $_GET['uInput'];
    }



    $stmt = $db->prepare("SELECT * FROM users AS u 
                    JOIN goals AS g 
                    ON u.id = g.user_id
                    WHERE username='John';");
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
<button type="submit" id="search"  name="search">Search</button>
    <input id="uInput" type="search" name="uInput" placeholder="username">
</form>

<script>
    const username = document.querySelector("#search").addEventListener('click', display);

    function display() {
        const username = document.getElementById('uInput').value;

    }


</script>
</body>
</html>